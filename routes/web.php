<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\AdminController;
use App\Models\AdminUser;

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

// HOME
Route::get('/', [FrontController::class, 'index'])->name('beranda');

// Login & Register
// 1. GET
Route::get('/login', [PembeliController::class, 'login'])->name('pembeli-login')->middleware('guest');
Route::get('/seller-login', [PenjualController::class, 'login'])->name('penjual-login')->middleware('guest');
Route::get('/admin-login', [AdminController::class, 'login'])->name('admin-login')->middleware('guest');

Route::get('/register', [PembeliController::class, 'register'])->name('pembeli-register')->middleware('guest');
Route::get('/seller-register', [PenjualController::class, 'register'])->name('penjual-register')->middleware('guest');

// 2. POST

Route::post('/register', [PembeliController::class, 'store']);
Route::post('/seller-register', [PenjualController::class, 'store']);

Route::post('/login', [PembeliController::class, 'authenticate']);
Route::post('/logout', [PembeliController::class, 'logout'])->name('pembeli-logout');

Route::post('/seller-login', [PenjualController::class, 'authenticate']);
Route::post('/seller-logout', [PenjualController::class, 'logout'])->name('penjual-logout');

Route::post('/admin-login', [AdminController::class, 'authenticate']);
Route::post('/admin-logout', [AdminController::class, 'logout'])->name('admin-logout');


// PEMBELI
Route::get('/product', [FrontController::class, 'show']);
Route::get('/cart', [PembeliController::class, 'cart'])->name('cart')->middleware('is_buyer');

// ORDER
Route::get('/order', [PembeliController::class, 'orderindex'])->name('buyer-order.index');
Route::get('/order/all', [PembeliController::class, 'orderall'])->name('buyer-order.all');
Route::get('/order/notpay', [PembeliController::class, 'ordernotpay'])->name('buyer-order.notpay');
Route::get('/order/packing', [PembeliController::class, 'orderpacking'])->name('buyer-order.packing');
Route::get('/order/shipping', [PembeliController::class, 'ordershipping'])->name('buyer-order.shipping');
Route::get('/order/finish', [PembeliController::class, 'orderfinish'])->name('buyer-order.finish');
Route::get('/order/cancel', [PembeliController::class, 'ordercancel'])->name('buyer-order.cancel');

// AKUN PEMBELI
Route::get('/account', [PembeliController::class, 'accountdetail'])->name('buyer-account.detail');


// PENJUAL
Route::get('/dashboard', [PenjualController::class, 'dashboard'])->name('penjual-dashboard')->middleware('is_seller');

// ADMIN
Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard')->middleware('is_admin');



