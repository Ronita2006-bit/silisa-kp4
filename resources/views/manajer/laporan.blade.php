@extends('layouts.app')

@section('title', 'Laporan · SiLiSa')
@section('trail', 'Laporan')
@section('page', 'manajer-laporan')

@section('content')
<div class="page-head">
    <div>
        <p class="eyebrow">SiLiSa</p>
        <h1>Laporan</h1>
    </div>
</div>

<section class="panel">
    <div class="panel-head"><h2>Rekap {{ $periode }}</h2></div>

    <div class="table-scroll" tabindex="0" role="region" aria-label="Tabel laporan limbah">
        <table>
            <caption>Rekap limbah per jenis</caption>
            <thead>
                <tr>
                    <th scope="col">Jenis</th>
                    <th scope="col">Dihasilkan (ton)</th>
                    <th scope="col">Terjual (ton)</th>
                    <th scope="col">Stok (ton)</th>
                    <th scope="col">Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $s)
                    <tr>
                        <td>{{ $s['nama'] }}</td>
                        <td>{{ number_format($s['dihasilkan'], 0, ',', '.') }}</td>
                        <td>{{ number_format($s['terjual'], 0, ',', '.') }}</td>
                        <td>{{ number_format($s['jumlah'], 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($s['pendapatan'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="mj-total">
                    <th scope="row">Total</th>
                    <td>{{ number_format($total['dihasilkan'], 0, ',', '.') }}</td>
                    <td>{{ number_format($total['terjual'], 0, ',', '.') }}</td>
                    <td>{{ number_format($total['jumlah'], 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($total['pendapatan'], 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="mj-actions">
        <button type="button" class="mj-btn mj-btn--solid" onclick="window.print()">Ekspor PDF</button>
        <a href="{{ route('laporan.excel') }}" class="mj-btn mj-btn--outline">Ekspor Excel</a>
    </div>
</section>
@endsection
