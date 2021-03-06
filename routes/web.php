<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardAdminCatalogController;
use App\Http\Controllers\DashboardAdminOfferController;
use App\Http\Controllers\DashboardAdminOrderController;
use App\Http\Controllers\DashboardAdminFinanceController;
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

Route::get('/product/{laptop}', [FrontController::class, 'show'])->name('product');
Route::get('/list/asus', [FrontController::class, 'listasus'])->name('product.asus');
Route::get('/list/hp', [FrontController::class, 'listhp'])->name('product.hp');
Route::get('/list/lenovo', [FrontController::class, 'listlenovo'])->name('product.lenovo');
Route::get('/list/dell', [FrontController::class, 'listdell'])->name('product.dell');
Route::get('/list/acer', [FrontController::class, 'listacer'])->name('product.acer');
Route::get('/list/apple', [FrontController::class, 'listapple'])->name('product.apple');
Route::get('/list/toshiba', [FrontController::class, 'listtoshiba'])->name('product.toshiba');
Route::get('/list/axioo', [FrontController::class, 'listaxioo'])->name('product.axioo');

Route::group(['middleware' => 'is_buyer'], function () {
    // CART
    Route::resource('cart', CartController::class);
    Route::post('cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    // ORDER
    Route::get('/order', [PembeliController::class, 'orderindex'])->name('buyer-order.index');
    Route::post('/order', [PembeliController::class, 'orderadd'])->name('buyer-order.add');
    Route::get('/order/all', [PembeliController::class, 'orderall'])->name('buyer-order.all');
    Route::get('/order/notpay', [PembeliController::class, 'ordernotpay'])->name('buyer-order.notpay');
    Route::get('/order/pay', [PembeliController::class, 'orderpay'])->name('buyer-order.pay');
    Route::get('/order/packing', [PembeliController::class, 'orderpacking'])->name('buyer-order.packing');
    Route::get('/order/shipping', [PembeliController::class, 'ordershipping'])->name('buyer-order.shipping');
    Route::get('/order/finish', [PembeliController::class, 'orderfinish'])->name('buyer-order.finish');
    Route::get('/order/cancel', [PembeliController::class, 'ordercancel'])->name('buyer-order.cancel');
    Route::post('/order/cancel/add', [PembeliController::class, 'ordercanceladd'])->name('buyer-order.cancel.add');
    Route::post('/order/addpayment', [PembeliController::class, 'orderaddpayment'])->name('buyer-order.addpayment');
    Route::post('/order/formtestimoni', [PembeliController::class, 'orderformtestimoni'])->name('buyer-order.formtestimoni');
    Route::post('/order/addtestimoni', [PembeliController::class, 'orderaddtestimoni'])->name('buyer-order.addtestimoni');

    // AKUN PEMBELI
    Route::get('/account', [PembeliController::class, 'accountindex'])->name('buyer-account.index');
    Route::get('/account/detail', [PembeliController::class, 'accountdetail'])->name('buyer-account.detail');
    Route::post('/account/detail', [PembeliController::class, 'accountdetailupdate'])->name('buyer-account.detailupdate');
    Route::get('/account/address', [PembeliController::class, 'accountaddress'])->name('buyer-account.address');
    Route::post('/account/address', [PembeliController::class, 'accountaddressupdate'])->name('buyer-account.addressupdate');
});

// PENJUAL
Route::get('/dashboard', [PenjualController::class, 'dashboard'])->name('penjual-dashboard')->middleware('is_seller');
Route::get('/dashboard/offer',[PenjualController::class,'offers'])->name('penjual-dashboard-offers')->middleware('is_seller');
Route::get('/dashboard/offer/accepted',[PenjualController::class,'offersaccepted'])->name('penjual-dashboard-offers-accepted')->middleware('is_seller');
Route::get('dashboard/offer/rejected',[PenjualController::class,'offersrejected'])->name('penjual-dashboard-offers-rejected')->middleware('is_seller');
Route::get('dashboard/add-laptop',[PenjualController::class,'addlaptop'])->name('penjual-dashboard-add-laptop')->middleware('is_seller');
Route::post('dashboard/add-laptop',[PenjualController::class,'storelaptop'])->name('penjual-dashboard-store-laptop')->middleware('is_seller');

Route::get('/dashboard/offer/detail/{id}',[PenjualController::class,'offerdetail'])->name('penjual-dashboard-offer-detail')->middleware('is_seller');
Route::delete('/dashboard/offer/detail/{id}',[PenjualController::class,'offerdetaildelete'])->name('penjual-dashboard-offer-detail-delete')->middleware('is_seller');

Route::get('/dashboard/offer/edit/{id}',[PenjualController::class,'offeredit'])->name('penjual-dashboard-offer-edit')->middleware('is_seller');
Route::post('/dashboard/offer/edit/{id}',[PenjualController::class,'offereditupdate'])->name('penjual-dashboard-offer-edit-update')->middleware('is_seller');
Route::delete('/dashboard/offer/edit/image/{id}',[PenjualController::class,'offereditimage'])->name('penjual-dashboard-offer-edit-image')->middleware('is_seller');

Route::get('dashboard/offer/accepted/detail/{id}',[PenjualController::class,'offeraccepteddetail'])->name('penjual-dashboard-offer-accepted-detail')->middleware('is_seller');
Route::get('dashboard/offer/rejected/detail/{id}',[PenjualController::class,'offerrejecteddetail'])->name('penjual-dashboard-offer-rejected-detail')->middleware('is_seller');

Route::get('dashboard/setting',[PenjualController::class,'setting'])->name('penjual-dashboard-setting')->middleware('is_seller');

Route::get('dashboard/setting/edit',[PenjualController::class,'settingedit'])->name('penjual-dashboard-setting-edit')->middleware('is_seller');
Route::post('dashboard/setting/edit',[PenjualController::class,'settingeditupdate'])->name('penjual-dashboard-setting-edit-update')->middleware('is_seller');

Route::get('dashboard/setting/add-bank',[PenjualController::class,'addbank'])->name('penjual-dashboard-setting-add-bank')->middleware('is_seller');
Route::post('dashboard/setting/add-bank',[PenjualController::class,'storebank'])->name('penjual-dashboard-setting-update-bank')->middleware('is_seller');

Route::get('dashboard/setting/edit-bank/{id}',[PenjualController::class,'editbank'])->name('penjual-dashboard-setting-edit-bank')->middleware('is_seller');
Route::post('dashboard/setting/edit-bank/{id}',[PenjualController::class,'editbankupdate'])->name('penjual-dashboard-setting-edit-bank-update')->middleware('is_seller');

// ADMIN
Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard')->middleware('is_admin');

Route::resource('/admin-dashboard/orders', DashboardAdminOrderController::class)->middleware('is_admin');
Route::resource('/admin-dashboard/laptops', DashboardAdminCatalogController::class)->middleware('is_admin');
Route::delete('/admin-dashboard/laptops/image/{laptopimage}', [DashboardAdminCatalogController::class,'destroyimage'])->name('laptops.image.destroy')->middleware('is_admin');
Route::resource('/admin-dashboard/sell_laptops', DashboardAdminOfferController::class)->middleware('is_admin');
Route::resource('/admin-dashboard/finance', DashboardAdminFinanceController::class)->middleware('is_admin');

