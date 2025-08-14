<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $query = Payment::with(['user', 'event', 'mpesaTransaction']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhereHas('event', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            })->orWhereHas('mpesaTransaction', function ($q) use ($search) {
                $q->where('mpesa_receipt_number', 'like', "%{$search}%");
            });
        }

        $payments = $query->latest()->paginate(10);

        return view('admin.payments.index', compact('payments'));
    }

    public function show(Payment $payment)
    {
        $payment->load(['event', 'mpesaTransaction']);
        return view('payment-status', compact('payment'));
    }

    public function stkPush(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric',
            'amount' => 'required|numeric|min:1',
            'payment_id' => 'required|exists:payments,id',
        ]);

        $payment = Payment::findOrFail($request->payment_id);

        $consumerKey = env('MPESA_CONSUMER_KEY');
        $consumerSecret = env('MPESA_CONSUMER_SECRET');

        $response = Http::withBasicAuth($consumerKey, $consumerSecret)
            ->get('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');

        $accessToken = $response['access_token'];

        $timestamp = date('YmdHis');
        $password = base64_encode(env('MPESA_SHORTCODE') . env('MPESA_PASSKEY') . $timestamp);

        $response = Http::withToken($accessToken)
            ->post('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest', [
                'BusinessShortCode' => env('MPESA_SHORTCODE'),
                'Password' => $password,
                'Timestamp' => $timestamp,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => $payment->amount,
                'PartyA' => $request->phone,
                'PartyB' => env('MPESA_SHORTCODE'),
                'PhoneNumber' => $request->phone,
                'CallBackURL' => env('MPESA_CALLBACK_URL'),
                'AccountReference' => $payment->id,
                'TransactionDesc' => 'Payment for Order #' . $payment->id,
            ]);

        return response()->json($response->json());
    }
}
