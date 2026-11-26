<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JenisLimbahController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\CatatLimbahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManajerStokController;
use App\Http\Controllers\LaporanController;

// Hanya untuk yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Wajib login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Khusus Operator
    Route::middleware('role:operator')->group(function () {
        Route::get('/catat-limbah', [CatatLimbahController::class, 'index'])->name('catat-limbah');
        Route::post('/catat-limbah/limbah', [CatatLimbahController::class, 'simpanLimbah'])->name('catat-limbah.limbah');
        Route::post('/catat-limbah/tbs', [CatatLimbahController::class, 'simpanTbs'])->name('catat-limbah.tbs');
        Route::get('/penjualan-keluar', fn () => view('operator.penjualan-keluar'))->name('penjualan-keluar');
        Route::get('/stok', fn () => view('operator.stok'))->name('stok');
        Route::get('/pembeli', fn () => view('operator.pembeli'))->name('pembeli');
    });

    // Khusus Manajer (BARU)
    Route::middleware('role:manajer')->group(function () {
       Route::get('/manajer/stok', [ManajerStokController::class, 'index'])->name('manajer.stok');
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.excel');
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
