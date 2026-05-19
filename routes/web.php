<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin.index');
