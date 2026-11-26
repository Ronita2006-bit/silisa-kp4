<?php

namespace App\Support;

use Illuminate\Support\Carbon;

class StokSimulasi
{
    /**
     * DATA SIMULASI stok per jenis limbah.
     * Dipakai oleh dashboard, halaman Stok, dan halaman Laporan.
     * Nanti ganti isi method ini dengan query database.
     */
    public static function semua()
    {
        return collect([
            ['nama' => 'Tandan kosong', 'dihasilkan' => 447, 'terjual' => 120, 'kapasitas' => 400, 'harga_per_ton' => 150000],
            ['nama' => 'Cangkang',      'dihasilkan' => 138, 'terjual' => 40,  'kapasitas' => 150, 'harga_per_ton' => 600000],
            ['nama' => 'Serat',         'dihasilkan' => 272, 'terjual' => 100, 'kapasitas' => 200, 'harga_per_ton' => 250000],
            ['nama' => 'Lumpur',        'dihasilkan' => 100, 'terjual' => 0,   'kapasitas' => 200, 'harga_per_ton' => 0],
            ['nama' => 'Abu boiler',    'dihasilkan' => 15,  'terjual' => 0,   'kapasitas' => 30,  'harga_per_ton' => 0],
        ])->map(function ($s) {
            $s['jumlah'] = $s['dihasilkan'] - $s['terjual'];
            $s['persen'] = round($s['jumlah'] / $s['kapasitas'] * 100);
            $s['pendapatan'] = $s['terjual'] * $s['harga_per_ton'];

            // level warna: ok (hijau), warn (kuning), danger (merah)
            $s['level'] = $s['persen'] >= 85 ? 'danger' : ($s['persen'] >= 80 ? 'warn' : 'ok');

            $s['status'] = $s['persen'] >= 100 ? 'Penuh'
                : ($s['persen'] >= 80 ? 'Hampir penuh' : 'Aman');

            return $s;
        });
    }

    /**
     * DATA SIMULASI limbah dihasilkan & terjual per hari (5 hari terakhir).
     * Total dihasilkan = 972 ton, total terjual = 260 ton (cocok dengan semua()).
     * Nanti ganti dengan query database.
     */
    public static function harian()
    {
        $dihasilkan = [180, 196, 188, 207, 201];
        $terjual    = [40, 65, 0, 80, 75];

        return collect($dihasilkan)->map(function ($nilai, $i) use ($terjual) {
            $tgl = Carbon::today()->subDays(4 - $i);

            return [
                'label'      => $tgl->format('d'),
                'dihasilkan' => $nilai,
                'terjual'    => $terjual[$i],
            ];
        });
    }
}
