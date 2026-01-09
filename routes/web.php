<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController; // frontend
use App\Http\Controllers\Admin\ProductController as AdminProductController; // admin
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// ==========================
// FRONTEND
// ==========================

Route::get('/', [ProductController::class, 'home'])->name('home');

// Tìm kiếm
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
// Sản phẩm
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

// Liên hệ
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/category/{slug}', [ProductController::class, 'category'])
    ->name('category.show');

// Giỏ hàng (NO LOGIN)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Checkout + Orders (LOGIN REQUIRED)
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

Route::get('/checkout/payment-guide/{order}', [CheckoutController::class, 'paymentGuide'])
    ->name('checkout.paymentGuide');
Route::post('/checkout/confirm-payment/{order}', [CheckoutController::class, 'confirmPayment'])
    ->name('checkout.confirmPayment');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// LOGIN – LOGOUT
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

// Route::middleware(['auth', 'is_admin'])
//     ->prefix('admin')
//     ->group(function () {
Route::prefix('admin')->middleware(['auth','is_admin'])->name('admin.')->group(function () {

    Route::post('/admin/logout', function () {
    Auth::logout();
    Session::flush();
    return redirect('/login')->with('success', 'Admin đã đăng xuất!');
})->name('admin.logout')->middleware(['auth','is_admin']);
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        // Route::resource('products', ProductController::class)->names('products');
        Route::resource('products', AdminProductController::class)->names([
        'index' => 'products.index',
        'create' => 'products.create',
        'store' => 'products.store',
        'show' => 'products.show',
        'edit' => 'products.edit',
        'update' => 'products.update',
        'destroy' => 'products.destroy',
    ]);

    Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class)
        ->names([
            'index' => 'orders.index',
            'show' => 'orders.show',
            'edit' => 'orders.edit',
            'update' => 'orders.update',
            'destroy' => 'orders.destroy',
        ]);

        Route::resource('categories', CategoryController::class)->names('categories');

        // Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class)->names('orders');

});

require __DIR__.'/auth.php';
