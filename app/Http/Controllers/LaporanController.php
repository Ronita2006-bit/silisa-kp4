<?php

namespace App\Http\Controllers;

use App\Support\StokSimulasi;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    public function index()
    {
        // DATA SIMULASI. Nanti diganti query database (lewat StokSimulasi).
        $laporan = StokSimulasi::semua();

        $total = [
            'dihasilkan' => $laporan->sum('dihasilkan'),
            'terjual'    => $laporan->sum('terjual'),
            'jumlah'     => $laporan->sum('jumlah'),
            'pendapatan' => $laporan->sum('pendapatan'),
        ];

        $periode = $this->periode();

        return view('manajer.laporan', compact('laporan', 'total', 'periode'));
    }

    /**
     * Ekspor sederhana: file CSV yang bisa dibuka di Excel.
     * Pemisah memakai titik koma (;) supaya rapi di Excel versi Indonesia.
     */
    public function exportExcel()
    {
        $laporan = StokSimulasi::semua();
        $namaFile = 'laporan-limbah-' . now()->format('Ymd') . '.csv';

        return response()->streamDownload(function () use ($laporan) {
            $out = fopen('php://output', 'w');
            fwrite($out, "\xEF\xBB\xBF"); // BOM supaya Excel membaca UTF-8
            fputcsv($out, ['Jenis', 'Dihasilkan (ton)', 'Terjual (ton)', 'Stok (ton)', 'Pendapatan (Rp)'], ';');

            foreach ($laporan as $s) {
                fputcsv($out, [$s['nama'], $s['dihasilkan'], $s['terjual'], $s['jumlah'], $s['pendapatan']], ';');
            }

            fclose($out);
        }, $namaFile, ['Content-Type' => 'text/csv; charset=UTF-8']);
    }

    /** Periode laporan: 5 hari terakhir, contoh "22 sampai 26 Nov 2026" */
    private function periode(): string
    {
        $akhir = Carbon::today()->locale('id');
        $awal  = $akhir->copy()->subDays(4);

        $awalTeks = $awal->month === $akhir->month
            ? $awal->format('d')
            : $awal->translatedFormat('d M');

        return $awalTeks . ' sampai ' . $akhir->translatedFormat('d M Y');
    }
}
