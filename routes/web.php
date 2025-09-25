<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::middleware(['guest.admin'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login-page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth.admin'])->group(function () {
    Route::get('/index', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});