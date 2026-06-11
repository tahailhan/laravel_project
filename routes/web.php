<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{id}', [HomeController::class, 'productDetail'])->name('product.detail');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::post('/logout', 'logout')->name('logout');
});



Route::middleware(['auth'])->group(function () {

    // Cart Routes
    Route::prefix('cart')->name('cart.')->controller(CartController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/add/{product}', 'add')->name('add');
        Route::post('/update/{cart}', 'update')->name('update');
        Route::delete('/remove/{cart}', 'remove')->name('remove');
    });

    // Checkout & Orders
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');
});



Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/', [AdminHomeController::class, 'index'])->name('dashboard');

    // Products
    Route::prefix('product')->name('product.')->controller(AdminProductController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{product}', 'show')->name('show');
        Route::get('/edit/{product}', 'edit')->name('edit');
        Route::put('/update/{product}', 'update')->name('update');
        Route::delete('/{product}', 'destroy')->name('destroy');
    });

    // Categories
    Route::prefix('categories')->name('categories.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{category}', 'show')->name('show');
        Route::get('/{category}/edit', 'edit')->name('edit');
        Route::put('/{category}/update', 'update')->name('update');
        Route::delete('/{category}', 'destroy')->name('destroy');
    });

    // Users (Resource Controller)
    Route::resource('users', AdminUserController::class);

    Route::prefix('orders')->name('orders.')->controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{order}', 'show')->name('show');
        Route::post('/status/{order}', 'updateStatus')->name('updateStatus');
    });

});
