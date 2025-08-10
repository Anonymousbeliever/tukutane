<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\Admin\AlumniController as AdminAlumniController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
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

    // Payments for Alumni
    Route::get('/payments/pay/{event?}', function (Event $event = null) {
        $payment = new Payment();
        $payment->amount = $event ? $event->price : 0;
        $payment->event_id = $event ? $event->id : null;
        $payment->type = $event ? 'event' : 'donation';

        return view('payments.pay', compact('payment', 'event'));
    })->name('payments.pay');

    Route::post('/payments/mpesa-stk-push', [MpesaController::class, 'stkPush'])->name('mpesa.stk_push');

    // Admin Routes
    Route::middleware('checkrole:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Alumni Management
        Route::resource('alumni', AdminAlumniController::class)->except(['show', 'create', 'store']); // Alumni are created via registration
        Route::get('alumni/{user}/edit', [AdminAlumniController::class, 'edit'])->name('alumni.edit');
        Route::patch('alumni/{user}', [AdminAlumniController::class, 'update'])->name('alumni.update');
        Route::delete('alumni/{user}', [AdminAlumniController::class, 'destroy'])->name('alumni.destroy');

        // Event Management
        Route::resource('events', AdminEventController::class);

        // Payment Management
        Route::get('payments', [AdminPaymentController::class, 'index'])->name('payments.index');
    });
});

require __DIR__.'/auth.php';
