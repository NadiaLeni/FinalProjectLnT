<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
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
    return view('welcome');
});
Route::get(
    '/create/product',
    [ProductsController::class, 'createProduct']
)->name('createProduct');
Route::post(
    '/store/product',
    [ProductsController::class, 'storeProduct']
)->name('storeProduct');
Route::get(
    '/status', function () {
    return view('createProductAgain');
});
Route::get(
    '/show/products',
    [ProductsController::class, 'showProducts']
)->name('showProducts');
Route::get(
    '/show/product/{id}',
    [ProductsController::class, 'showProductById']
)->name('showProductById');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
