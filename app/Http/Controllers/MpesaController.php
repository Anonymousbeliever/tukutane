<?php

namespace App\Http\Controllers;

use App\Models\MpesaTransaction;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MpesaController extends Controller
{
    /**
     * Initiate an M-Pesa STK Push.
     */
    public function stkPush(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'phone_number' => 'required|string|min:10', // More flexible for demo
            'payment_id' => 'required|exists:payments,id',
        ]);

        $amount = $request->amount;
        $phone = $request->phone_number;
        $paymentId = $request->payment_id;

        // Ensure phone number is in correct format for demo
        if (!str_starts_with($phone, '254')) {
            // Convert 07XXXXXXXX to 2547XXXXXXXX
            if (str_starts_with($phone, '0')) {
                $phone = '254' . substr($phone, 1);
            }
        }

        $timestamp = now()->format('YmdHis');
        $password = base64_encode(env('MPESA_SHORTCODE') . env('MPESA_PASSKEY') . $timestamp);

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->generateAccessToken(),
            ])->post('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest', [
                'BusinessShortCode' => env('MPESA_SHORTCODE'),
                'Password' => $password,
                'Timestamp' => $timestamp,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => $amount,
                'PartyA' => $phone,
                'PartyB' => env('MPESA_SHORTCODE'),
                'PhoneNumber' => $phone,
                'CallBackURL' => env('MPESA_CALLBACK_URL'),
                'AccountReference' => 'TukutanePayment-' . $paymentId,
                'TransactionDesc' => 'Payment for Tukutane',
            ]);

            $responseData = $response->json();
            Log::info('M-Pesa STK Push Response:', $responseData);

            if ($response->successful() && isset($responseData['CheckoutRequestID'])) {
                MpesaTransaction::create([
                    'payment_id' => $paymentId,
                    'merchant_request_id' => $responseData['MerchantRequestID'] ?? null,
                    'checkout_request_id' => $responseData['CheckoutRequestID'],
                    'result_desc' => $responseData['ResponseDescription'] ?? 'STK Push initiated successfully.',
                    'phone_number' => $phone,
                    'amount' => $amount,
                ]);

                // Update payment status to pending
                Payment::find($paymentId)->update(['status' => 'pending']);

                return redirect()->route('payment.status', $paymentId)
                    ->with('success', 'M-Pesa STK Push initiated. Please check your phone to complete the payment.');
            } else {
                Log::error('M-Pesa STK Push Error: ' . json_encode($responseData));
                $errorMessage = $responseData['errorMessage'] ?? $responseData['ResponseDescription'] ?? 'Unknown error.';
                return back()->with('error', 'Failed to initiate M-Pesa STK Push: ' . $errorMessage);
            }
        } catch (\Exception $e) {
            Log::error('M-Pesa STK Push Exception: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while initiating M-Pesa STK Push.');
        }
    }

    /**
     * Handle M-Pesa callback.
     */
    public function callback(Request $request)
    {
        $callbackData = $request->json()->all();
        Log::info('M-Pesa Callback Received:', $callbackData);

        $resultCode = $callbackData['Body']['stkCallback']['ResultCode'] ?? null;
        $checkoutRequestID = $callbackData['Body']['stkCallback']['CheckoutRequestID'] ?? null;
        $merchantRequestID = $callbackData['Body']['stkCallback']['MerchantRequestID'] ?? null;
        $resultDesc = $callbackData['Body']['stkCallback']['ResultDesc'] ?? 'No description.';

        $mpesaTransaction = MpesaTransaction::where('checkout_request_id', $checkoutRequestID)
                                            ->orWhere('merchant_request_id', $merchantRequestID)
                                            ->first();

        if ($mpesaTransaction) {
            $mpesaTransaction->raw_callback_payload = $callbackData;
            $mpesaTransaction->result_code = $resultCode;
            $mpesaTransaction->result_desc = $resultDesc;

            if ($resultCode == 0) {
                // Payment successful
                $callbackMetadata = $callbackData['Body']['stkCallback']['CallbackMetadata']['Item'] ?? [];
                $amount = collect($callbackMetadata)->firstWhere('Name', 'Amount')['Value'] ?? null;
                $mpesaReceiptNumber = collect($callbackMetadata)->firstWhere('Name', 'MpesaReceiptNumber')['Value'] ?? null;
                $transactionDate = collect($callbackMetadata)->firstWhere('Name', 'TransactionDate')['Value'] ?? null;
                $phoneNumber = collect($callbackMetadata)->firstWhere('Name', 'PhoneNumber')['Value'] ?? null;

                $mpesaTransaction->amount = $amount;
                $mpesaTransaction->mpesa_receipt_number = $mpesaReceiptNumber;
                $mpesaTransaction->transaction_date = $transactionDate;
                $mpesaTransaction->phone_number = $phoneNumber;

                $mpesaTransaction->payment->update(['status' => 'completed']);
            } else {
                // Payment failed or cancelled
                $mpesaTransaction->payment->update(['status' => 'failed']);
            }
            $mpesaTransaction->save();
        } else {
            Log::warning('M-Pesa Callback: No matching transaction found for CheckoutRequestID: ' . $checkoutRequestID);
        }

        return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Callback processed successfully']);
    }

    /**
     * Show payment status (for demo purposes)
     */
    public function paymentStatus(Payment $payment)
    {
        return view('payments.status', compact('payment'));
    }

    /**
     * Generate M-Pesa Access Token.
     */
    private function generateAccessToken()
    {
        $consumerKey = env('MPESA_CONSUMER_KEY');
        $consumerSecret = env('MPESA_CONSUMER_SECRET');
        $credentials = base64_encode($consumerKey . ':' . $consumerSecret);

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $credentials,
        ])->get('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');

        if ($response->successful()) {
            return $response->json()['access_token'];
        }

        Log::error('Failed to generate M-Pesa access token:', $response->json());
        throw new \Exception('Failed to generate M-Pesa access token');
    }
}