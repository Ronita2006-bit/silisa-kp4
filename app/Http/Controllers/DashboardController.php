<?php

namespace App\Http\Controllers;

use App\Support\StokSimulasi;

class DashboardController extends Controller
{
    public function index()
    {
        // Operator tetap memakai dashboard lama.
        // Admin & manajer memakai dashboard ringkasan.
        if (! in_array(auth()->user()->peran, ['admin', 'manajer'])) {
            return view('dashboard');
        }

        // ==========================================================
        // DATA SIMULASI. Nanti diganti dengan query dari database.
        // Semua data diambil dari StokSimulasi.
        // ==========================================================
        $stok   = StokSimulasi::semua();
        $harian = StokSimulasi::harian();

        // Peringatan muncul kalau stok >= 80% kapasitas
        $peringatan = $stok->filter(fn ($s) => $s['persen'] >= 80)->values();

        $ringkasan = [
            'dihasilkan_hari_ini' => $harian->last()['dihasilkan'],
            'total_stok'          => $stok->sum('jumlah'),
            'terjual_5_hari'      => $stok->sum('terjual'),
            'pendapatan'          => $stok->sum('pendapatan'),
        ];

        // Batas atas sumbu grafik, dibulatkan ke kelipatan 50
        $grafik = [
            'hari' => $harian,
            'maks' => max(50, ceil($harian->max('dihasilkan') / 50) * 50),
        ];

        return view('dashboard', compact('peringatan', 'ringkasan', 'grafik'));
    }
}
