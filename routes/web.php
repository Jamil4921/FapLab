<?php

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

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/home', [App\Http\Controllers\AdminController::class, 'adminHome']);
    Route::get('/product', [App\Http\Controllers\ProductController::class, 'adminProduct']);
    Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'showId']);
    Route::get('/user/{id}', [App\Http\Controllers\AdminController::class, 'showUserId']);
    Route::post('/product', [App\Http\Controllers\ProductController::class, 'store']);
    Route::get('/create', [App\Http\Controllers\ProductController::class, 'create']);
    Route::delete('/product/{id}', [App\Http\Controllers\ProductController::class, 'delete']);
    Route::delete('/user/{id}', [App\Http\Controllers\AdminController::class, 'deleteUser']);
    Route::get('/useredit/{id}', [App\Http\Controllers\AdminController::class, 'editUser']);
    Route::get('/productedit/{id}', [App\Http\Controllers\ProductController::class, 'editProduct']);
    Route::put('/productedit/{id}', [App\Http\Controllers\ProductController::class, 'editProductUpdate']);
    Route::put('/useredit/{id}', [App\Http\Controllers\AdminController::class, 'editUserUpdate']);
    Route::get('/order', [App\Http\Controllers\AdminController::class, 'showOrder']);
});



Route::get('/', [App\Http\Controllers\HomeController::class, 'homePage'])->middleware('auth');
Route::get('/recharge/{id}', [App\Http\Controllers\RechargeController::class, 'rechargePage'])->middleware('auth');
Route::put('/add_amount/{id}', [App\Http\Controllers\RechargeController::class, 'addAmount'])->middleware('auth');
Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->middleware('auth');
Route::post('/add_cart/{id}', [App\Http\Controllers\CartController::class, 'addCart'])->middleware('auth');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'showCart'])->middleware('auth');
Route::get('/order', [App\Http\Controllers\CartController::class, 'order'])->middleware('auth');
Route::delete('/remove_cart/{id}', [App\Http\Controllers\CartController::class, 'removeCart'])->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
