<?php

use App\Http\Controllers\AuthMember\AuthenticatedSessionController;
use App\Http\Controllers\AuthMember\ConfirmablePasswordController;
use App\Http\Controllers\AuthMember\EmailVerificationNotificationController;
use App\Http\Controllers\AuthMember\EmailVerificationPromptController;
use App\Http\Controllers\AuthMember\NewPasswordController;
use App\Http\Controllers\AuthMember\PasswordController;
use App\Http\Controllers\AuthMember\PasswordResetLinkController;
use App\Http\Controllers\AuthMember\RegisteredUserController;
use App\Http\Controllers\AuthMember\SecondAuthController;
use App\Http\Controllers\AuthMember\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:member')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('member-login', [AuthenticatedSessionController::class, 'create'])
                ->name('login.member');

    Route::post('member-login', [AuthenticatedSessionController::class, 'store'])->name('login.storeMember');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth:member', 'member')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout-member', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout.member');
});
