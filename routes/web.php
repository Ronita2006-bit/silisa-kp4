<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JenisLimbahController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\CatatLimbahController;

// Hanya untuk yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Wajib login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return view('dashboard');
    });
// Khusus Operator
Route::middleware('role:operator')->group(function () {
   Route::get('/catat-limbah', [CatatLimbahController::class, 'index'])->name('catat-limbah');
Route::post('/catat-limbah/limbah', [CatatLimbahController::class, 'simpanLimbah'])->name('catat-limbah.limbah');
Route::post('/catat-limbah/tbs', [CatatLimbahController::class, 'simpanTbs'])->name('catat-limbah.tbs');
   Route::get('/penjualan-keluar', fn () => view('operator.penjualan-keluar'))->name('penjualan-keluar');
   Route::get('/stok', fn () => view('operator.stok'))->name('stok');
    Route::get('/pembeli', fn () => view('operator.pembeli'))->name('pembeli');
});
    // Khusus Admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('pengguna', PenggunaController::class)->except(['show', 'destroy']);
        Route::patch('pengguna/{pengguna}/status', [PenggunaController::class, 'toggleStatus'])->name('pengguna.status');

        Route::resource('jenis-limbah', JenisLimbahController::class)
            ->except('show')
            ->parameters(['jenis-limbah' => 'jenisLimbah']);
    });
});