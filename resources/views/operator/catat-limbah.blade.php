@extends('layouts.silisa')

@section('title', 'Catat limbah · SiLiSa')
@section('trail', 'Catat limbah')

@section('content')
@php
    $fmt = fn ($n) => rtrim(rtrim(number_format($n, 1, ',', '.'), '0'), ',');
    $errLimbah = $errors->getBag('limbah');
    $errTbs = $errors->getBag('tbs');
    $rekapC = collect($rekap);
    $baris = $rekapC->first();
    $rasio = ($baris && $baris['tbs'] > 0) ? round($baris['perkiraan'] / $baris['tbs'], 4) : 0.22;
    $hariIni = $rekapC->first(fn ($r) => $r['tanggal']->isToday());
    $tbsHariIni = $hariIni['tbs'] ?? 0;
    $perluDicek = $rekapC->where('wajar', false)->count();
    $riwayat = isset($riwayatHariIni) ? collect($riwayatHariIni) : null;
    $warna = ['tandan kosong' => '#c48a52', 'cangkang' => '#e07b2a', 'serat' => '#e2b24f', 'abu boiler' => '#8c6a56'];
@endphp

<div class="hd"><div class="eb">Operator</div><h1>Catat limbah harian</h1><p>Catat limbah yang dihasilkan dan TBS yang diolah. Stok dan perbandingan dihitung otomatis oleh sistem.</p></div>

@if (session('sukses'))
    <div class="op-alert ok" role="status">{{ session('sukses') }}</div>
@endif
@unless ($tkksAda)
    <div class="op-alert warn" role="alert">Jenis limbah "Tandan kosong" belum ada di menu Jenis Limbah (akun Admin), jadi kolom Tercatat akan selalu 0.</div>
@endunless

<div class="grid">
  @if ($riwayat)
  <div class="op-card st" style="--d:1"><div class="l">Limbah hari ini<span class="ic a"><svg class="i"><use href="#hex"/></svg></span></div><div class="v"><span class="num" id="sL" data-count="{{ round($riwayat->sum('jumlah'), 1) }}">{{ $fmt($riwayat->sum('jumlah')) }}</span><em>ton</em></div><small>{{ $riwayat->pluck('jenis')->unique()->count() }} jenis limbah tercatat</small></div>
  @endif
  <div class="op-card st" style="--d:2"><div class="l">TBS diolah<span class="ic g"><svg class="i"><use href="#bar"/></svg></span></div><div class="v"><span class="num" id="sT" data-count="{{ round($tbsHariIni, 1) }}">{{ $fmt($tbsHariIni) }}</span><em>ton</em></div><small>Masuk pengolahan hari ini</small></div>
  <div class="op-card st" style="--d:3"><div class="l">Status selisih<span class="ic r"><svg class="i"><use href="#al"/></svg></span></div><div class="v"><span class="num" id="sS" data-count="{{ $perluDicek }}" data-dec="0">{{ $perluDicek }}</span><em>perlu dicek</em></div><small>Dari {{ $rekapC->count() }} tanggal terakhir</small></div>

  <section class="op-card fm" style="--d:4">
    <h2>Limbah dihasilkan</h2><p class="sub">Pilih jenis limbah, isi jumlahnya, lalu simpan.</p>
    <form id="fWaste" method="POST" action="{{ route('catat-limbah.limbah') }}">
      @csrf
      <label for="jenis">Jenis limbah</label>
      <select id="jenis" name="jenis_limbah_id" required>
        @foreach ($jenisLimbah as $j)
          <option value="{{ $j->id }}" @selected(old('jenis_limbah_id') == $j->id)>{{ $j->nama }}</option>
        @endforeach
      </select>
      <div class="chips" id="chips" hidden></div>
      @if ($errLimbah->has('jenis_limbah_id'))<p class="op-error">{{ $errLimbah->first('jenis_limbah_id') }}</p>@endif
      <div class="op-row">
        <div>
          <label for="tgl-limbah">Tanggal</label>
          <input type="date" id="tgl-limbah" name="tgl_limbah" value="{{ old('tgl_limbah', now()->toDateString()) }}" required>
          @if ($errLimbah->has('tgl_limbah'))<p class="op-error">{{ $errLimbah->first('tgl_limbah') }}</p>@endif
        </div>
        <div>
          <label for="jumlah">Jumlah (ton)</label>
          <input type="number" id="jumlah" name="jumlah" step="0.01" min="0.01" placeholder="0,0" value="{{ old('jumlah') }}" required>
          @if ($errLimbah->has('jumlah'))<p class="op-error">{{ $errLimbah->first('jumlah') }}</p>@endif
        </div>
      </div>
      <button type="submit" class="op-btn">Simpan <svg class="i"><path d="M5 12h14M13 6l6 6-6 6"/></svg></button>
    </form>
  </section>

  @if ($riwayat)
  <section class="op-card hs" style="--d:5"><h2>Riwayat hari ini</h2><p class="sub">Catatan terbaru Anda.</p>
    <ul class="hl" id="hl">
      @forelse ($riwayat as $r)
        <li><span class="dot" style="background:{{ $warna[\Illuminate\Support\Str::lower($r['jenis'])] ?? '#c48a52' }}"></span><div class="n"><b>{{ $r['jenis'] }}</b><small>{{ $r['jam'] }}</small></div><span class="q">{{ $fmt($r['jumlah']) }} ton</span></li>
      @empty
        <li><div class="n"><small>Belum ada catatan hari ini.</small></div></li>
      @endforelse
    </ul>
  </section>
  @endif

  <section class="op-card wd" style="--d:6;padding:30px">
    <h2>TBS yang diolah</h2><p class="sub">Sistem menghitung perkiraan tandan kosong, lalu membandingkannya dengan yang dicatat.</p>
    <form id="fTbs" method="POST" action="{{ route('catat-limbah.tbs') }}">
      @csrf
      <div class="op-row">
        <div>
          <label for="tgl-tbs">Tanggal</label>
          <input type="date" id="tgl-tbs" name="tgl_tbs" value="{{ old('tgl_tbs', now()->toDateString()) }}" required>
          @if ($errTbs->has('tgl_tbs'))<p class="op-error">{{ $errTbs->first('tgl_tbs') }}</p>@endif
        </div>
        <div>
          <label for="tbs">TBS diolah (ton)</label>
          <input type="number" id="tbs" name="jumlah_tbs" step="0.01" min="0.01" placeholder="0,0" value="{{ old('jumlah_tbs') }}" required>
          @if ($errTbs->has('jumlah_tbs'))<p class="op-error">{{ $errTbs->first('jumlah_tbs') }}</p>@endif
        </div>
      </div>
      <div class="est" data-ratio="{{ $rasio }}"><div><b>PERKIRAAN TKKS</b><span>Muncul otomatis saat TBS diisi</span></div><div class="num">≈ <span id="est" data-v="0">0,0</span> <small>ton</small></div></div>
      <button type="submit" class="op-btn">Simpan TBS <svg class="i"><path d="M5 12h14M13 6l6 6-6 6"/></svg></button>
    </form>
  </section>

  <section class="op-card wd" style="--d:7">
    <div class="hh"><h2>Perbandingan TBS dan perkiraan TKKS</h2><p class="sub" style="margin:0">Selisih kecil berarti pencatatan sesuai perkiraan.</p></div>
    <div class="tw" tabindex="0" role="region" aria-label="Perbandingan TKKS">
      <table>
        <thead><tr><th scope="col">TANGGAL</th><th scope="col">TBS (TON)</th><th scope="col">PERKIRAAN TKKS</th><th scope="col">TERCATAT</th><th scope="col">SELISIH</th><th scope="col">STATUS</th></tr></thead>
        <tbody>
          @forelse ($rekap as $r)
            <tr>
              <td>{{ $r['tanggal']->format('d M Y') }}</td>
              <td>{{ $fmt($r['tbs']) }}</td>
              <td>{{ $fmt($r['perkiraan']) }}</td>
              <td>{{ $fmt($r['tercatat']) }}</td>
              <td>{{ number_format($r['selisih'], 1, ',', '.') }}%</td>
              <td><span class="pill {{ $r['wajar'] ? 'ok' : 'bad' }}">{{ $r['wajar'] ? 'Wajar' : 'Periksa data' }}</span></td>
            </tr>
          @empty
            <tr><td colspan="6">Belum ada data TBS. Simpan TBS untuk melihat perbandingan.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>
</div>
@endsection
