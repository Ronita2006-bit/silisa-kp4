@extends('layouts.app')

@section('title', 'Catat limbah · SiLiSa')
@section('trail', 'Catat limbah')
@section('page', 'operator')

@section('content')
@php
    $fmt = fn ($n) => rtrim(rtrim(number_format($n, 1, ',', '.'), '0'), ',');
    $errLimbah = $errors->getBag('limbah');
    $errTbs = $errors->getBag('tbs');
@endphp

<div class="page-head">
    <div>
        <p class="eyebrow">Operator</p>
        <h1>Catat limbah harian</h1>
    </div>
</div>

@if (session('sukses'))
    <div class="sl-alert sl-alert-ok" role="status">{{ session('sukses') }}</div>
@endif

@unless ($tkksAda)
    <div class="sl-alert sl-alert-warn" role="alert">
        Jenis limbah "Tandan kosong" belum ada di menu Jenis Limbah (akun Admin), jadi kolom Tercatat akan selalu 0.
    </div>
@endunless

<form method="POST" action="{{ route('catat-limbah.limbah') }}" class="sl-card">
    @csrf
    <h2>Limbah dihasilkan</h2>
    <div class="sl-grid">
        <div>
            <label for="tgl-limbah">Tanggal</label>
            <input type="date" id="tgl-limbah" name="tgl_limbah" value="{{ old('tgl_limbah', now()->toDateString()) }}" required>
            @if ($errLimbah->has('tgl_limbah'))<p class="sl-error">{{ $errLimbah->first('tgl_limbah') }}</p>@endif
        </div>
        <div>
            <label for="jenis">Jenis limbah</label>
            <select id="jenis" name="jenis_limbah_id" required>
                @foreach ($jenisLimbah as $j)
                    <option value="{{ $j->id }}" @selected(old('jenis_limbah_id') == $j->id)>{{ $j->nama }}</option>
                @endforeach
            </select>
            @if ($errLimbah->has('jenis_limbah_id'))<p class="sl-error">{{ $errLimbah->first('jenis_limbah_id') }}</p>@endif
        </div>
        <div>
            <label for="jumlah">Jumlah (ton)</label>
            <input type="number" id="jumlah" name="jumlah" step="0.01" min="0.01" value="{{ old('jumlah') }}" required>
            @if ($errLimbah->has('jumlah'))<p class="sl-error">{{ $errLimbah->first('jumlah') }}</p>@endif
        </div>
    </div>
    <button type="submit" class="button primary">Simpan</button>
</form>

<section class="sl-card">
    <h2>TBS yang diolah</h2>
    <p class="sl-hint">Sistem menghitung perkiraan tandan kosong, lalu membandingkannya dengan yang dicatat.</p>

    <form method="POST" action="{{ route('catat-limbah.tbs') }}">
        @csrf
        <div class="sl-grid sl-grid-2">
            <div>
                <label for="tgl-tbs">Tanggal</label>
                <input type="date" id="tgl-tbs" name="tgl_tbs" value="{{ old('tgl_tbs', now()->toDateString()) }}" required>
                @if ($errTbs->has('tgl_tbs'))<p class="sl-error">{{ $errTbs->first('tgl_tbs') }}</p>@endif
            </div>
            <div>
                <label for="tbs">TBS diolah (ton)</label>
                <input type="number" id="tbs" name="jumlah_tbs" step="0.01" min="0.01" value="{{ old('jumlah_tbs') }}" required>
                @if ($errTbs->has('jumlah_tbs'))<p class="sl-error">{{ $errTbs->first('jumlah_tbs') }}</p>@endif
            </div>
        </div>
        <button type="submit" class="button">Simpan TBS</button>
    </form>

    <div class="table-scroll" tabindex="0" role="region" aria-label="Perbandingan TKKS">
        <table>
            <thead>
                <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">TBS (ton)</th>
                    <th scope="col">Perkiraan TKKS</th>
                    <th scope="col">Tercatat</th>
                    <th scope="col">Selisih</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rekap as $r)
                    <tr>
                        <td>{{ $r['tanggal']->format('d M Y') }}</td>
                        <td>{{ $fmt($r['tbs']) }}</td>
                        <td>{{ $fmt($r['perkiraan']) }}</td>
                        <td>{{ $fmt($r['tercatat']) }}</td>
                        <td>{{ number_format($r['selisih'], 1, ',', '.') }}%</td>
                        <td>
                            <span class="sl-chip {{ $r['wajar'] ? 'sl-ok' : 'sl-warn' }}">
                                {{ $r['wajar'] ? 'Wajar' : 'Periksa data' }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">Belum ada data TBS. Simpan TBS untuk melihat perbandingan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection