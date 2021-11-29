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

Route::get('/', [FrontController::class, 'index'])->name('beranda');
Route::get('/product', [FrontController::class, 'show']);
Route::get('/cart', [PembeliController::class, 'cart'])->name('cart');


// Login & Register
Route::get('/buyer-login', [PembeliController::class, 'login'])->name('pembeli-login');
Route::get('/seller-login', [PenjualController::class, 'login'])->name('penjual-login');
Route::get('/admin-login', [AdminController::class, 'login'])->name('admin-login');

Route::get('/buyer-register', [PembeliController::class, 'register'])->name('pembeli-register');
Route::get('/seller-register', [PenjualController::class, 'register'])->name('penjual-register');
