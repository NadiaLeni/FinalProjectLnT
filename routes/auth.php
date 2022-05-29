<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

Route::get(
    '/create/product',
    [ProductsController::class, 'createProduct']
)->middleware('admin');

Route::post(
    '/store/product',
    [ProductsController::class, 'storeProduct']
)->name('storeProduct')->middleware('admin');
Route::get(
    '/status', function () {
    return view('createProductAgain');
});
Route::get(
    '/show/products',
    [ProductsController::class, 'showProducts']
)->name('showProducts')->middleware('admin');
Route::get(
    '/show/product/{id}',
    [ProductsController::class, 'showProductById']
)->name('showProductById');



Route::get(
    'update/product/{id}',
    [ProductsController::class, 'formUpdateProduct']
)->name('formUpdateProduct')->middleware('admin');

Route::patch(
    'updating/product/{id}',
    [ProductsController::class, 'updateProduct']
)->name('updateProduct')->middleware('admin');

Route::delete(
    'delete/product/{id}',
    [ProductsController::class, 'deleteProduct']
)->name('deleteProduct')->middleware('admin');



Route::get(
    'update/faktur/{id}',
    [ProductsController::class, 'formUpdateFaktur']
)->name('formUpdateFaktur')->middleware('guest');
Route::patch(
    'updating/faktur/{id}',
    [ProductsController::class, 'updateFaktur']
)->name('updateFaktur')->middleware('guest');
Route::delete(
    'delete/faktur/{id}',
    [ProductsController::class, 'deleteFaktur']
)->name('deleteFaktur')->middleware('guest');

// kalo middleware guest, tanpa login bisa lihat
// kalo middleware auth, harus login dulu baru bisa lihat
