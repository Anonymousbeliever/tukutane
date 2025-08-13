<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Admin\AlumniController as AdminAlumniController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Models\Event;
use App\Models\Payment;
use App\Models\MpesaTransaction; // ✅ Import MpesaTransaction model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str; // ✅ Import Str helper

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (Auth::check()) {
        return Auth::user()->isAdmin()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('dashboard');
    }
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Alumni Dashboard
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Events for Alumni
    Route::get('/events', function () {
        $events = Event::orderBy('date', 'desc')->paginate(10);
        return view('events.index', compact('events'));
    })->name('events.index');

    Route::get('/events/{event}', fn (Event $event) => view('events.show', compact('event')))->name('events.show');

    // Payments for Alumni
    Route::get('/payments/pay/{event?}', function (Event $event = null) {
        $payment = new Payment();
        $payment->amount = $event ? $event->price : 0;
        $payment->event_id = $event?->id;
        $payment->type = $event ? 'event' : 'donation';

        return view('payments.pay', compact('payment', 'event'));
    })->name('payments.pay');

    Route::post('/payments/mpesa-stk-push', [MpesaController::class, 'stkPush'])->name('mpesa.stk_push');

    // Settings Page
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::patch('/settings', [SettingsController::class, 'update'])->name('settings.update');

    // ✅ Payment status route (inside auth middleware)
    Route::get('/payments/status/{payment}', [MpesaController::class, 'paymentStatus'])->name('payment.status');

    // ✅ Test payment route (inside auth middleware)
    Route::post('/payments/test-success/{payment}', function (Payment $payment) {
        $payment->update(['status' => 'completed']);

        // Fake M-Pesa transaction for demo
        MpesaTransaction::create([
            'payment_id' => $payment->id,
            'merchant_request_id' => 'ws_CO_' . time(),
            'checkout_request_id' => 'ws_CO_' . time(),
            'result_code' => '0',
            'result_desc' => 'Test payment successful',
            'mpesa_receipt_number' => 'TEST' . strtoupper(Str::random(8)),
            'amount' => $payment->amount,
            'transaction_date' => now()->format('YmdHis'),
            'phone_number' => '254700000000',
        ]);

        return redirect()->route('payment.status', $payment);
    })->name('payments.test_success');

    // Admin Routes
    Route::middleware('checkrole:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');

        // Alumni Management
        Route::resource('alumni', AdminAlumniController::class)->except(['show', 'create', 'store']);
        Route::get('alumni/{user}/edit', [AdminAlumniController::class, 'edit'])->name('alumni.edit');
        Route::patch('alumni/{user}', [AdminAlumniController::class, 'update'])->name('alumni.update');
        Route::delete('alumni/{user}', [AdminAlumniController::class, 'destroy'])->name('alumni.destroy');

        // Event Management
        Route::resource('events', AdminEventController::class);

        // Payment Management
        Route::get('payments', [AdminPaymentController::class, 'index'])->name('payments.index');
    });
});

require __DIR__ . '/auth.php';
