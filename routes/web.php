<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SegmentController;

Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/admin', function () {
    return view('dashboard.dashboard');
});

Route::get('admin/categories/table', [CategoryController::class, 'table'])->name('categories.table');
Route::resource('admin/categories', CategoryController::class);

Route::get('admin/segments/table', [SegmentController::class, 'table'])->name('segments.table');
Route::resource('admin/segments', SegmentController::class);

Route::get('/products/filter', [ProductController::class, 'filter'])->name('products.filter');
Route::resource('admin/products', ProductController::class);