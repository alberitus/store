<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/admin', function () {
    return view('dashboard.dashboard');
});

Route::resource('categories', CategoryController::class);

Route::get('/products/filter', [ProductController::class, 'filter'])->name('products.filter');
Route::resource('products', ProductController::class);