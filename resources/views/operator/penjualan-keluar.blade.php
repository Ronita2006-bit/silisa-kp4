@extends('layouts.app')

@section('title', 'Penjualan keluar · SiLiSa')
@section('trail', 'Penjualan keluar')
@section('page', 'operator')

@section('content')
@php
    // Data contoh. Di langkah berikutnya diganti data dari database.
    $jenisLimbah = ['Tandan kosong', 'Cangkang', 'Serat', 'Abu boiler'];
    $pembeli = ['CV Kompos Riau', 'PT Energi Biomassa', 'Tani Makmur'];
    $riwayat = [
        ['tanggal' => '11 Nov', 'jenis' => 'Serat',         'ton' => 100, 'harga' => 250000, 'pembeli' => 'PT Energi Biomassa'],
        ['tanggal' => '10 Nov', 'jenis' => 'Cangkang',      'ton' => 40,  'harga' => 600000, 'pembeli' => 'PT Energi Biomassa'],
        ['tanggal' => '11 Nov', 'jenis' => 'Tandan kosong', 'ton' => 60,  'harga' => 150000, 'pembeli' => 'Tani Makmur'],
        ['tanggal' => '09 Nov', 'jenis' => 'Tandan kosong', 'ton' => 60,  'harga' => 150000, 'pembeli' => 'CV Kompos Riau'],
    ];
    $rp = fn ($angka) => 'Rp ' . number_format($angka, 0, ',', '.');
@endphp

<div class="page-head">
    <div>
        <p class="eyebrow">Operator</p>
        <h1>Penjualan keluar</h1>
    </div>
</div>

<section class="sl-card">
    <h2>Catat penjualan</h2>
    <div class="sl-grid sl-grid-4">
        <div>
            <label for="tgl-jual">Tanggal</label>
            <input type="date" id="tgl-jual" value="2026-11-12">
        </div>
        <div>
            <label for="jenis-jual">Jenis limbah</label>
            <select id="jenis-jual">
                @foreach ($jenisLimbah as $j)
                    <option>{{ $j }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="jumlah-jual">Jumlah (ton)</label>
            <input type="number" id="jumlah-jual" step="0.1" min="0">
        </div>
        <div>
            <label for="harga-jual">Harga per ton (Rp)</label>
            <input type="number" id="harga-jual" value="150000" min="0">
        </div>
        <div>
            <label for="pembeli-jual">Pembeli</label>
            <select id="pembeli-jual">
                @foreach ($pembeli as $p)
                    <option>{{ $p }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <button type="button" class="button primary">Simpan penjualan</button>
</section>

<section class="sl-card">
    <h2>Riwayat penjualan</h2>
    <div class="table-scroll" tabindex="0" role="region" aria-label="Riwayat penjualan">
        <table>
            <thead>
                <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Ton</th>
                    <th scope="col">Harga/ton</th>
                    <th scope="col">Total</th>
                    <th scope="col">Pembeli</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayat as $r)
                    <tr>
                        <td>{{ $r['tanggal'] }}</td>
                        <td>{{ $r['jenis'] }}</td>
                        <td>{{ $r['ton'] }}</td>
                        <td>{{ $rp($r['harga']) }}</td>
                        <td>{{ $rp($r['ton'] * $r['harga']) }}</td>
                        <td>{{ $r['pembeli'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection