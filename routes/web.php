<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('/export-users', [DashboardController::class, 'exportUsers'])->name('export.users');
        Route::post('/import-users', [DashboardController::class, 'importUsers'])->name('import.users');
        Route::get('admin/users', [AdminController::class, 'index'])->name('admin.users');
        Route::delete('/users/{id}', [AdminController::class, 'delete'])->name('users.delete');
        Route::get('admin/edit', [AdminController::class, 'edit'])->name('admin.edit');
    });
});
