<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Guest routes (not logged in)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Admin only routes
    Route::middleware('admin')->group(function () {
        Route::get('/admin/users', [DashboardController::class, 'manageUsers'])->name('admin.users');
        Route::get('/admin/items', [DashboardController::class, 'manageItems'])->name('admin.items');
    });
    
    // Staff only routes
    Route::middleware('staff')->group(function () {
        Route::get('/staff/verify-claims', [DashboardController::class, 'verifyClaims'])->name('staff.verify');
    });
});