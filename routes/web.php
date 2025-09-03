<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('cart', function () {
        return view('cart');
    })->name('cart');

    Route::get('checkout', function () {
        return view('checkout');
    })->name('checkout');
});
