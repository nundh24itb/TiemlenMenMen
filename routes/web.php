<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\CartController;
// use App\Http\Controllers\ProductController; // frontend
// use App\Http\Controllers\RevenueController;
// use App\Http\Controllers\OrderController;
// use App\Http\Controllers\ContactController;
// use App\Http\Controllers\CheckoutController;
// use App\Http\Controllers\Admin\AdminController;
// use App\Http\Controllers\Admin\UserController;
// Route::get('/', function () {
//     return view('home');  // resources/views/home.blade.php
// });

// // Trang sản phẩm
// Route::get('/products', function () {
//     return view('products.index');
// });

// // Trang giỏ hàng
// Route::get('/cart', function () {
//     return view('cart.index');
// });

// // Trang liên hệ
// Route::get('/contact', function () {
//     return view('contact.index');
// });
// // Trang chủ
// Route::get('/', [ProductController::class, 'home'])->name('home');

// // Sản phẩm frontend
// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// // Liên hệ
// Route::get('/contact', [ContactController::class, 'index'])->name('contact');
// Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// // Dashboard & profile (auth + verified)
// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// // Giỏ hàng (không cần login)
// Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
// Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
// Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
// Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// // Checkout + đơn hàng user (auth)
// Route::middleware(['auth'])->group(function () {
//     Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
//     Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');

//     Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
//     Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
// });

// // Biểu đồ doanh thu
// Route::get('/revenue-chart', [RevenueController::class, 'revenueChart']);

// // Auth routes
// require __DIR__.'/auth.php';

// // ------------------ ADMIN PANEL ------------------
// // Chỉ dùng 1 nhóm route admin, không trùng
// // Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
// //     // Dashboard admin
// //     Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');

// //     // Quản lý sản phẩm
// //     Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->names('admin.products');

// //     // Quản lý đơn hàng
// //     Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class)->names('admin.orders');

// //     // Quản lý user
// //     Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->names('admin.users');
// // });
// Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
//     // Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

//     // // Users management (resource)
//     // Route::get('/users', [UserController::class, 'index'])->name('users');
//     // Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
//     // Route::post('/users', [UserController::class, 'store'])->name('users.store');
//     // Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
//     // Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
//     // Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
//     // Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
//     // Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
//     // Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
//     //     Route::resource('products', ProductController::class);
//     //     Route::resource('categories', CategoryController::class);
//     //     Route::resource('users', UserController::class);
//     //     Route::resource('orders', OrderController::class);

//     // Bạn có thể add thêm routes cho posts, orders, settings,...
// });

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController; // frontend
use App\Http\Controllers\Admin\ProductController as AdminProductController; // admin
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

// ==========================
// FRONTEND
// ==========================

// Trang chủ
Route::get('/', [ProductController::class, 'home'])->name('home');


// Sản phẩm
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Liên hệ
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

//Tìm kiếm
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
// Giỏ hàng (KHÔNG CẦN LOGIN)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Checkout + Orders (phải login)
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');

    // Đơn hàng user
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

// ==========================
// PROFILE + DASHBOARD
// ==========================
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile/view', [ProfileController::class, 'index'])
    ->middleware('auth')
    ->name('profile');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', function () {
    Auth::logout();
    Session::flush();
    return redirect('/')->with('success', 'Bạn đã đăng xuất thành công!');
})->name('logout')->middleware('auth');


// ==========================
// ADMIN
// ==========================
Route::prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {

        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])
            ->name('admin.dashboard');

        // RESOURCE CRUD
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)
            ->names('admin.products');

        Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class)
            ->names('admin.orders');

        Route::resource('users', \App\Http\Controllers\Admin\UserController::class)
            ->names('admin.users');
});

// ==========================
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
