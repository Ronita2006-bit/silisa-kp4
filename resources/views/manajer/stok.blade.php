@extends('layouts.app')

@section('title', 'Stok · SiLiSa')
@section('trail', 'Stok')
@section('page', 'manajer-stok')

@section('content')
<div class="page-head">
    <div>
        <p class="eyebrow">SiLiSa</p>
        <h1>Stok limbah</h1>
        <p>Stok = total dihasilkan dikurangi total terjual, dihitung otomatis.</p>
    </div>
</div>

<section class="panel">
    <div class="table-scroll" tabindex="0" role="region" aria-label="Tabel stok limbah">
        <table>
            <caption>Stok limbah per jenis</caption>
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
                    <tr>
                        <td>{{ $s['nama'] }}</td>
                        <td>{{ number_format($s['dihasilkan'], 0, ',', '.') }}</td>
                        <td>{{ number_format($s['terjual'], 0, ',', '.') }}</td>
                        <td><strong>{{ number_format($s['jumlah'], 0, ',', '.') }}</strong></td>
                        <td>
                            <div class="mj-meter mj-meter--{{ $s['level'] }}" role="img"
                                aria-label="{{ $s['persen'] }}% dari kapasitas {{ $s['kapasitas'] }} ton">
                                <span style="width: {{ min($s['persen'], 100) }}%"></span>
                            </div>
                            <div class="mj-meter-note">{{ $s['persen'] }}% dari {{ $s['kapasitas'] }} ton</div>
                        </td>
                        <td><span class="mj-badge mj-badge--{{ $s['level'] }}">{{ $s['status'] }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
