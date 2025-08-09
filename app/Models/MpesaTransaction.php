<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpesaTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'payment_id',
        'merchant_request_id',
        'checkout_request_id',
        'result_code',
        'result_desc',
        'mpesa_receipt_number',
        'amount',
        'transaction_date',
        'phone_number',
        'raw_callback_payload',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'raw_callback_payload' => 'array',
        'amount' => 'decimal:2',
    ];

    /**
     * Get the payment that owns the M-Pesa transaction.
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
