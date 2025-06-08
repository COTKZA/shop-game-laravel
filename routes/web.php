<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\StoreController;

use App\Http\Controllers\Admin\NotifyController;
use App\Http\Controllers\Admin\AccountsController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

//////////////////////////////////////////////////// Users  ////////////////////////////////////////////////////////////////////
Route::get('/', [HomeController::class, 'index']);
Route::get('/store', [StoreController::class, 'index']);
// Route::get('/store', function () {
//     return view('users.store');
// });

Route::get('/store/store_category', function() {
    return view('users.store.store_category');
});

Route::get('/store/card', function() {
    return view('users.store.store_card');
});

Route::get('/store/product_details', function() {
    return view('users.store.store_details');
});

Route::get('/topup', function() {
    return view('users.topup');
});

Route::get('/topup/slip-verify', function() {
    return view('users.topup.slip_verify');
});

Route::get('/topup/truemoney', function() {
    return view('users.topup.truemoney');
});

Route::get('/history/order', function() {
    return view('users.history.orders');
});

Route::get('/history/topup', function() {
    return view('users.history.topup');
});

Route::get('/topup/choose_amount', function() {
    return view('users.topup.choose_amount');
});

Route::get('/store/random_wheel', function() {
    return view('users.store.random_wheel');
});

//////////////////////////////////////////////////// Users  ////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////// Admin  ////////////////////////////////////////////////////////////////////
Route::get('/admin/dashboard', function(){
    return view('admin.dashboard');
});

// notify
Route::get('/admin/notify', [NotifyController::class, 'index']);
Route::post('/add_notify', [NotifyController::class, 'add_notify']);
Route::post('/delete_notify/{id}', [NotifyController::class, 'delete_notify']);
Route::post('/edit_notify/{id}', [NotifyController::class, 'edit_notify']);

// accounts
Route::get('/admin/accounts', [AccountsController::class, 'index']);
Route::post('/ban_accounts/{id}', [AccountsController::class, 'ban_accounts']);
Route::post('/edit_accounts/{id}', [AccountsController::class, 'edit_accounts']);

// wallets
Route::get('/admin/wallets', [WalletController::class, 'index']);

//category
Route::get('/admin/categories', [CategoryController::class, 'index']);
Route::post('/add_categories', [CategoryController::class, 'add_categories']);
Route::post('/delete_categories/{id}', [CategoryController::class, 'delete_categories']);
Route::post('/edit_categories/{id}', [CategoryController::class, 'edit_categories']);

//product
Route::get('/admin/product', [ProductController::class, 'index']);
Route::post('/add_product', [ProductController::class, 'add_product']);
Route::post('/edit_product/{id}', [ProductController::class, 'edit_product']);
Route::post('/delete_product/{id}', [ProductController::class, 'delete_product']);

// ImageProduct
Route::get('/admin/product/img/{id}', [ProductController::class, 'product_img']);
Route::post('/add_productimg', [ProductController::class, 'add_productimg']);
Route::post('/edit_productimg/{id}', [ProductController::class, 'edit_productimg']);
Route::post('/delete_productimg/{id}', [ProductController::class, 'delete_productimg']);

// Product Details
Route::get('/admin/product/product_details/{id}', [ProductController::class, 'product_details']);
Route::post('/add_productdetails', [ProductController::class, 'add_productdetails']);
Route::post('/edit_productdetails/{id}', [ProductController::class, 'edit_productdetails']);
Route::post('/delete_productdetails/{id}', [ProductController::class, 'delete_productdetails']);
//////////////////////////////////////////////////// Admin  ////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////// Auth  ////////////////////////////////////////////////////////////////////
Auth::routes();
//////////////////////////////////////////////////// Auth  ////////////////////////////////////////////////////////////////////
