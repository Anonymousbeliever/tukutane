<?php

namespace App\Http\Controllers\Admin; // ← important

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment');
    }

    public function stkPush(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric',
            'amount' => 'required|numeric|min:1',
            'payment_id' => 'required|string',
        ]);

        $phone = $request->phone;
        $amount = $request->amount;
        $paymentId = $request->payment_id;

        // Generate access token
        $consumerKey = env('MPESA_CONSUMER_KEY');
        $consumerSecret = env('MPESA_CONSUMER_SECRET');

        $response = Http::withBasicAuth($consumerKey, $consumerSecret)
            ->get('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');

        $accessToken = $response['access_token'];

        // STK Push
        $response = Http::withToken($accessToken)
            ->post('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest', [
                'BusinessShortCode' => env('MPESA_SHORTCODE'),
                'Password' => base64_encode(env('MPESA_SHORTCODE') . env('MPESA_PASSKEY') . date('YmdHis')),
                'Timestamp' => date('YmdHis'),
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => $amount,
                'PartyA' => $phone,
                'PartyB' => env('MPESA_SHORTCODE'),
                'PhoneNumber' => $phone,
                'CallBackURL' => env('MPESA_CALLBACK_URL'),
                'AccountReference' => $paymentId,
                'TransactionDesc' => 'Payment for Order ' . $paymentId,
            ]);

        return response()->json($response->json());
    }
}
