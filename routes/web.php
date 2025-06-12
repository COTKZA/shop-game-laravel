<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\StoreController;
use App\Http\Controllers\User\OrderHistoryController;
use App\Http\Controllers\User\TopupHistoryController;
use App\Http\Controllers\User\WalletTransactionController;

use App\Http\Controllers\Admin\NotifyController;
use App\Http\Controllers\Admin\AccountsController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\PurchasesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AccountBanController;

//////////////////////////////////////////////////// Users  ////////////////////////////////////////////////////////////////////
Route::get('/', [HomeController::class, 'index']);
Route::get('/store', [StoreController::class, 'index']);

// store
Route::get('/store/card/{id}', [StoreController::class, 'product_category']);
Route::get('/store/product_details/{id}', [StoreController::class, 'product_details']);
Route::post('/buy/product/{id}', [StoreController::class, 'buy_product']);

// Topup
Route::get('/topup', function() {
    return view('users.topup');
});
Route::get('/topup/truemoney', function() {
    return view('users.topup.truemoney');
});
Route::get('/topup/slip-verify', function() {
    return view('users.topup.slip_verify');
});
Route::post('/add_payment', [WalletTransactionController::class, 'add_payment']);
Route::post('/add_truemoney', [WalletTransactionController::class, 'add_truemoney']);


Route::get('/history/order', [OrderHistoryController::class, 'index']);
Route::get('/history/topup', [TopupHistoryController::class, 'index']);


Route::get('/store/random_wheel', function() {
    return view('users.store.random_wheel');
});

//////////////////////////////////////////////////// Users  ////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////// Admin  ////////////////////////////////////////////////////////////////////

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

// Wallet Transaction
Route::get('/admin/wallet_transaction', [TransactionController::class, 'index']);
Route::post('/approve_wallet/{id}', [TransactionController::class, 'approve_wallet']);
Route::post('/reject_wallet/{id}', [TransactionController::class, 'reject_wallet']);

//Account Ban
Route::get('/admin/account_ban', [AccountBanController::class, 'index']);
Route::post('/account_ban/{id}', [AccountBanController::class, 'account_ban']);
Route::post('/account_unban/{id}', [AccountBanController::class, 'account_unban']);

// Purchases
Route::get('/admin/purchases', [PurchasesController::class, 'index']);

// Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index']);
//////////////////////////////////////////////////// Admin  ////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////// Auth  ////////////////////////////////////////////////////////////////////
Auth::routes();
//////////////////////////////////////////////////// Auth  ////////////////////////////////////////////////////////////////////
