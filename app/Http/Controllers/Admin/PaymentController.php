<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the payments.
     */
    public function index()
    {
        $payments = Payment::with(['user', 'event', 'mpesaTransaction'])->paginate(10);
        return view('admin.payments.index', compact('payments'));
    }

    // Potentially add methods to view/manage individual payments if needed
}
