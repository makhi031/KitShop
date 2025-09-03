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

    Route::get('/profile', function () {
        return view('user/customer/profile');
    })->name('profile');

    Route::get('/cart', function () {
        return view('user/customer/cart');
    })->name('cart');

    Route::get('/checkout', function () {
        return view('user/customer/checkout');
    })->name('checkout');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'hasRole:admin',
])->group(function () {
    Route::get('/admin', function () {
        return view('user/admin/adminPanel');
    })->name('admin.panel');

    Route::get('/admin/products', function () {
        return view('user/admin/products');
    })->name('admin.products');

    Route::get('/admin/users', function () {
        return view('user/admin/users');
    })->name('admin.users');

    Route::get('/admin/orders', function () {
        return view('user/admin/orders');
    })->name('admin.orders');
});
