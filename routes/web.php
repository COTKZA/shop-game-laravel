<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.home');
});

Route::get('/store', function () {
    return view('users.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
