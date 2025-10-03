<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


Route::middleware(['guest.admin'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login-page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth.admin'])->group(function () {

    //Dashboard
    Route::get('/index', [AdminController::class, 'index'])->name('index');
    
    // Product Modules
    Route::get('/products/index', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/create', action: [ProductController::class, 'create'])->name('products.create');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::post('/products/store', action: [ProductController::class, 'store'])->name('products.store');
    Route::delete('/products/{product}', action: [ProductController::class, 'destroy'])->name('products.destroy');

    //Category Modules
    Route::get('/category/index', [CategoryController::class, 'index'])->name('categorys.index');
    Route::get('/category/show', [CategoryController::class, 'show'])->name('categorys.show');
    Route::get('/category/create', action: [CategoryController::class, 'create'])->name('categorys.create');
    Route::post('/category/edit', action: [CategoryController::class, 'edit'])->name('categorys.edit');
    Route::post('/category/store', action: [CategoryController::class, 'store'])->name('categorys.store');
    Route::post('/category/destroy', action: [CategoryController::class, 'destroy'])->name('categorys.destroy');

    //Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});