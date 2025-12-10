<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Middleware\IsAdmin;

// Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

//     Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

//     Route::resource('products', ProductController::class);
//     Route::resource('categories', CategoryController::class);
//     Route::resource('orders', OrderController::class)->only(['index', 'show']);

// });

Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('orders', OrderController::class)->only(['index', 'show']);
});
