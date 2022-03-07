<?php

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


Route::get('/', [\App\Http\Controllers\FoodController::class, 'index'])->name('index');
Route::get('cart', [\App\Http\Controllers\FoodController::class, 'cart'])->name('cart');
Route::get('order', [\App\Http\Controllers\FoodController::class, 'order'])->name('order');
Route::post('place-order', [\App\Http\Controllers\FoodController::class, 'placeOrder'])->name('place.order');
Route::get('add-to-cart', [\App\Http\Controllers\FoodController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [\App\Http\Controllers\FoodController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [\App\Http\Controllers\FoodController::class, 'remove'])->name('remove.from.cart');
