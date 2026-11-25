@extends('layouts.app')

@section('title', 'Pembeli · SiLiSa')
@section('trail', 'Pembeli')
@section('page', 'operator')

@section('content')
@php
    // Data contoh. Di langkah database diambil dari tabel pembeli.
    $pembeli = [
        ['nama' => 'CV Kompos Riau',     'kontak' => '0812-0000-1111'],
        ['nama' => 'Tani Makmur',        'kontak' => '0813-0000-2222'],
        ['nama' => 'PT Energi Biomassa', 'kontak' => '0821-0000-3333'],
    ];

    // Riwayat penjualan contoh (sama dengan halaman Penjualan keluar).
    // Total beli tiap pembeli dijumlahkan dari sini.
    $penjualan = [
        ['pembeli' => 'PT Energi Biomassa', 'ton' => 100],
        ['pembeli' => 'PT Energi Biomassa', 'ton' => 40],
        ['pembeli' => 'Tani Makmur',        'ton' => 60],
        ['pembeli' => 'CV Kompos Riau',     'ton' => 60],
    ];
    $totalBeli = collect($penjualan)->groupBy('pembeli')->map(fn ($g) => $g->sum('ton'));
@endphp

<div class="page-head">
    <div>
        <p class="eyebrow">Operator</p>
        <h1>Data pembeli</h1>
    </div>
</div>

<section class="sl-card">
    <div class="table-scroll" tabindex="0" role="region" aria-label="Data pembeli">
        <table>
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Kontak</th>
                    <th scope="col">Total beli (ton)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembeli as $p)
                    <tr>
                        <td>{{ $p['nama'] }}</td>
                        <td>{{ $p['kontak'] }}</td>
                        <td>{{ $totalBeli[$p['nama']] ?? 0 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<section class="sl-card">
    <h2>Tambah pembeli</h2>
    <div class="sl-grid sl-grid-2">
        <div>
            <label for="nama-pembeli">Nama</label>
            <input type="text" id="nama-pembeli">
        </div>
        <div>
            <label for="kontak-pembeli">Kontak</label>
            <input type="text" id="kontak-pembeli">
        </div>
    </div>
    <button type="button" class="button primary">Simpan</button>
</section>
@endsection