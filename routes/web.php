<?php

use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin');
/**
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/{category}/update', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{category}/delete', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
**/


Route::prefix('admin')->name('admin.')->group(function () {


    Route::prefix('product')->name('product.')->controller(AdminProductController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{product}', 'show')->name('show');
        Route::get('/edit/{product}', 'edit')->name('edit');
        Route::put('/update/{product}', 'update')->name('update');
        Route::delete('/{product}', 'destroy')->name('destroy');
    });

    Route::prefix('categories')->name('categories.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{category}', 'show')->name('show');
        Route::get('/{category}/edit', 'edit')->name('edit');
        Route::put('/{category}/update', 'update')->name('update');
        Route::delete('/{category}', 'destroy')->name('destroy');
    });

});
