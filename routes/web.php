<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('admin/users', [AdminController::class, 'index'])->name('admin.users');
        Route::get('admin/users/{user}', [AdminController::class, 'show'])->name('admin.users.show');
        Route::post('admin/users/upload', [AdminController::class, 'upload'])->name('admin.users.upload');
        Route::get('admin/users/download', [AdminController::class, 'download'])->name('admin.users.download');
    });
});
