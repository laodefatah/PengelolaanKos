<?php

use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LandingPageController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [LandingPageController::class, 'index'])->name('home');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'doLogin'])->name('dologin');
    Route::post('register', [AuthController::class, 'doRegister']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransaksiController::class, 'store']);
    Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit']);
    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy']);
    Route::put('/transaksi/{id}', [TransaksiController::class, 'update']);
});

// Middleware untuk admin
Route::middleware([
    'auth',
    RoleMiddleware::class . ':admin',
    ])->group(function () {
        Route::get('/dashboardadmin', [AuthController::class, 'adminDashboard'])->name('dashboard_admin');
        Route::resource('penghuni',PenghuniController::class);
        Route::resource('kamar',KamarController::class);
        Route::get('/transaksi/laporan', [TransaksiController::class, 'laporan']);
        Route::get('transaksi/pengingat', [TransaksiController::class, 'pengingat']);
});

// Middleware untuk guest
Route::middleware([
    'auth',
    RoleMiddleware::class . ':guest',
])->group(function () {
        Route::get('/home', [AuthController::class, 'guestDashboard'])->name('home');
});
