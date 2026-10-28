<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\MembershipApplicationController
    as MemberMembershipApplicationController;

use App\Http\Controllers\Member\PaymentController
    as MemberPaymentController;

use App\Http\Controllers\Admin\MembershipApplicationController
    as AdminMembershipApplicationController;

use App\Http\Controllers\Admin\PaymentController
    as AdminPaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->middleware('auth')->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// MEMBER ROUTES
Route::middleware(['auth'])
    ->prefix('member')
    ->name('member.')
    ->group(function () {

        Route::get(
            '/applications',
            [MemberMembershipApplicationController::class, 'index']
        )->name('applications.index');

        Route::post(
            '/applications',
            [MemberMembershipApplicationController::class, 'store']
        )->name('applications.store');

        Route::post(
            '/applications/{application}/payment',
            [MemberPaymentController::class, 'store']
        )
        ->whereNumber('application')
        ->name('applications.payment.store');
    });


// ADMIN ROUTES
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get(
            '/applications',
            [AdminMembershipApplicationController::class, 'index']
        )->name('applications.index');

        Route::patch(
            '/applications/{application}/review',
            [AdminMembershipApplicationController::class, 'update']
        )
        ->whereNumber('application')
        ->name('applications.review');

        Route::get(
            '/payments',
            [AdminPaymentController::class, 'index']
        )->name('payments.index');

        Route::patch(
            '/payments/{payment}/decision',
            [AdminPaymentController::class, 'update']
        )
        ->whereNumber('payment')
        ->name('payments.decision');

        Route::get(
            '/payments/{payment}/proof',
            [AdminPaymentController::class, 'proof']
        )
        ->whereNumber('payment')
        ->name('payments.proof');
    });

require __DIR__.'/auth.php';
