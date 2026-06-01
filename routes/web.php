<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin');

Route::get('/admin/categories',  [CategoryController::class, 'index'])->name('categories.index');
Route::get('/admin/categories/create',  [CategoryController::class, 'create'])->name('categories.create');
Route::post('/admin/categories/store',  [CategoryController::class, 'store'])->name('categories.store');
Route::get('/admin/categories/{category}',   [CategoryController::class, 'show'])->name('categories.show');
Route::get('/admin/categories/{id}/edit',  [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/admin/categories/{id}/update',  [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/admin/categories/{id}/delete',  [CategoryController::class, 'destroy'])->name('categories.destroy');
