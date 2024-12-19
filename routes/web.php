<?php

use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', [LandingPageController::class, 'index'])->name('landing_page');

Route::get('/penghuni', [PenghuniController::class, 'index'])->name('penghuni');
Route::get('/penghuni/{id}/edit', [PenghuniController::class, 'edit']);
Route::put('/penghuni/{id}', [PenghuniController::class, 'update']);
Route::delete('/penghuni/{id}', [PenghuniController::class, 'destroy']);
Route::get('/penghuni/create', [PenghuniController::class, 'create']);
Route::post('/penghuni', [PenghuniController::class, 'store'])->name('penghuni.store');

Route::get('/kamar', [KamarController::class, 'index']);
Route::get('/kamar/create', [KamarController::class, 'create']);
Route::post('/kamar', [KamarController::class, 'store']);
Route::get('/kamar/{id}/edit', [KamarController::class, 'edit']);
Route::delete('/kamar/{id}', [KamarController::class, 'destroy']);
Route::put('/kamar/{id}', [KamarController::class, 'update']);

Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/transaksi/create', [TransaksiController::class, 'create']);
Route::post('/transaksi', [TransaksiController::class, 'store']);
Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit']);
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy']);
Route::put('/transaksi/{id}', [TransaksiController::class, 'update']);
Route::get('/transaksi/laporan', [TransaksiController::class, 'laporan']);
Route::get('transaksi/pengingat', [TransaksiController::class, 'pengingat']);
// Route::get('/laporan', [LaporanController::class, 'index']);
// Route::get('/laporan/keuangan', [LaporanController::class, 'laporanKeuangan']);
// Route::get('/laporan/penghuni', [LaporanController::class, 'laporanPenghuni']);
// Route::get('/laporan/kamar', [LaporanController::class, 'laporanKamar']);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'doLogin'])->name('dologin');;
Route::post('register', [AuthController::class, 'doRegister']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('dashboard_admin');
// Route::get('/penghuni', [AuthController::class, 'guestDashboard'])->name('penghuni_index');
Route::get('/user/landing', [AuthController::class, 'guestDashboard'])->name('landing_page');

// Route::middleware(['auth'])->group(function () {
//     // Dashboard dengan role 'admin'
//     Route::middleware(['role:admin'])->group(function () {
//         Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
//     });

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('dashboard_admin');
    Route::get('/user/landing', [AuthController::class, 'guestDashboard'])->name('landing_page');
});
// Route::middleware(['role:guest'])->group(function () {
//     Route::get('/guest/dashboard', [DashboardController::class, 'index'])->name('guest.dashboard');
// });