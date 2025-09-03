<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('kits', function () {
    return view('kits');
})->name('kits');

Route::get('tools', function () {
    return view('tools');
})->name('tools');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('user/customer/profile', function () {
        return view('user/customer/profile');
    })->name('profile');

    Route::get('user/customer/cart', function () {
        return view('user/customer/cart');
    })->name('cart');

    Route::get('user/customer/checkout', function () {
        return view('user/customer/checkout');
    })->name('checkout');
});
