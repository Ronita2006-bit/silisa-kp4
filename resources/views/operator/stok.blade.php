@extends('layouts.app')

@section('title', 'Stok · SiLiSa')
@section('trail', 'Stok')
@section('page', 'operator')

@section('content')
@php
    // Data contoh. Di langkah database, "dihasilkan" dan "terjual" dijumlahkan dari catatan.
    $stok = [
        ['jenis' => 'Tandan kosong', 'dihasilkan' => 447, 'terjual' => 120, 'kapasitas' => 400],
        ['jenis' => 'Cangkang',      'dihasilkan' => 138, 'terjual' => 40,  'kapasitas' => 150],
        ['jenis' => 'Serat',         'dihasilkan' => 272, 'terjual' => 100, 'kapasitas' => 200],
        ['jenis' => 'Lumpur',        'dihasilkan' => 100, 'terjual' => 0,   'kapasitas' => 200],
        ['jenis' => 'Abu boiler',    'dihasilkan' => 15,  'terjual' => 0,   'kapasitas' => 30],
    ];
    $batasPenuh = 80; // di atas 80% dianggap "Hampir penuh"
@endphp

<div class="page-head">
    <div>
        <p class="eyebrow">Operator</p>
        <h1>Stok limbah</h1>
        <p>Stok = total dihasilkan dikurangi total terjual, dihitung otomatis.</p>
    </div>
</div>

<section class="sl-card">
    <div class="table-scroll" tabindex="0" role="region" aria-label="Stok limbah">
        <table>
            <thead>
                <tr>
                    <th scope="col">Jenis</th>
                    <th scope="col">Dihasilkan</th>
                    <th scope="col">Terjual</th>
                    <th scope="col">Stok (ton)</th>
                    <th scope="col">Kapasitas</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stok as $s)
                    @php
                        $sisa = $s['dihasilkan'] - $s['terjual'];
                        $persen = min(100, round($sisa / $s['kapasitas'] * 100));
                        $penuh = $persen >= $batasPenuh;
                    @endphp
                    <tr>
                        <td>{{ $s['jenis'] }}</td>
                        <td>{{ $s['dihasilkan'] }}</td>
                        <td>{{ $s['terjual'] }}</td>
                        <td><strong>{{ $sisa }}</strong></td>
                        <td>
                            <div class="sl-bar" role="img" aria-label="{{ $persen }} persen dari kapasitas">
                                <span class="sl-bar-fill {{ $penuh ? 'sl-bar-amber' : '' }}" style="width: {{ $persen }}%"></span>
                            </div>
                        </td>
                        <td>
                            <span class="sl-chip {{ $penuh ? 'sl-amber' : 'sl-ok' }}">
                                {{ $penuh ? 'Hampir penuh' : 'Aman' }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection