<?php

use App\Http\Controllers\PenghuniController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/penghuni', [PenghuniController::class, 'index']);