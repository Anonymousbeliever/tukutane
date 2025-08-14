<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Admin\AlumniController as AdminAlumniController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Alumni Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Events for Alumni
    Route::get('/events', function () {
        $events = Event::orderBy('date', 'desc')->paginate(10);
        return view('events.index', compact('events'));
    })->name('events.index');

    Route::get('/events/{event}', function (Event $event) {
        return view('events.show', compact('event'));
    })->name('events.show');

    // Test payment form route (for development)
    Route::get('/test-payment', function () {
        // Create a test payment record
        $payment = Payment::create([
            'user_id' => Auth::id(),
            'amount' => 1000,
            'event_id' => null,
            'type' => 'donation',
            'status' => 'pending',
        ]);

        return view('payments.pay', compact('payment'));
    })->name('test.payment');

    // Payments for Alumni - Create payment record before showing form
    Route::get('/payments/pay/{event?}', function (Event $event = null) {
        $payment = Payment::create([
            'user_id' => Auth::id(),
            'amount' => $event ? $event->price : 1000,
            'event_id' => $event ? $event->id : null,
            'type' => $event ? 'event' : 'donation',
            'status' => 'pending',
        ]);

        return view('payments.pay', compact('payment', 'event'));
    })->name('payments.pay');

    // Initiate M-Pesa STK Push
    Route::post('/payments/mpesa-stk-push', [MpesaController::class, 'stkPush'])->name('mpesa.stk_push');

    // Payment Status Route
    Route::get('/payments/{payment}/status', [MpesaController::class, 'paymentStatus'])->name('payment.status');

    // Test Success Route (for local development only)
    Route::post('/payments/{payment}/test-success', function (Payment $payment) {
        $payment->update(['status' => 'completed']);
        return redirect()->route('payment.status', $payment)->with('success', 'Payment marked as successful (demo mode).');
    })->name('payments.test_success');

    // Settings Page
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::patch('/settings', [SettingsController::class, 'update'])->name('settings.update');

    // Admin Routes
    Route::middleware('checkrole:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Alumni Management
        Route::get('alumni', [AdminAlumniController::class, 'index'])->name('alumni.index');
        Route::get('alumni/{user}/edit', [AdminAlumniController::class, 'edit'])->name('alumni.edit');
        Route::patch('alumni/{user}', [AdminAlumniController::class, 'update'])->name('alumni.update');
        Route::delete('alumni/{user}', [AdminAlumniController::class, 'destroy'])->name('alumni.destroy');

        // Event Management
        Route::resource('events', AdminEventController::class);

        // Payment Management
        Route::get('payments', [AdminPaymentController::class, 'index'])->name('payments.index');
    });
});

// M-Pesa Callback Route (outside auth middleware)
Route::post('/mpesa/callback', [MpesaController::class, 'callback'])->name('mpesa.callback');

require __DIR__.'/auth.php';