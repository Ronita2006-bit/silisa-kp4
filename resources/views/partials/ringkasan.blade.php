{{-- Isi bersama dashboard (banner, kartu, grafik). Dipakai admin.dashboard dan manajer.dashboard --}}
<div class="page-head">
    <div>
        <p class="eyebrow">SiLiSa</p>
        <h1>Dashboard</h1>
        <p>Ringkasan limbah PKS.</p>
    </div>
</div>

{{-- ===== Banner peringatan stok ===== --}}
@foreach ($peringatan as $p)
    <div class="mj-alert mj-alert--{{ $p['level'] }}" role="alert">
        <div class="mj-alert-text">
            Stok <strong>{{ strtolower($p['nama']) }}</strong> mencapai {{ $p['persen'] }}% kapasitas
            ({{ $p['jumlah'] }} dari {{ $p['kapasitas'] }} ton). Segera jadwalkan penjualan.
        </div>
        <div class="mj-bar" aria-hidden="true"><span style="width: {{ min($p['persen'], 100) }}%"></span></div>
    </div>
@endforeach

{{-- ===== Kartu ringkasan ===== --}}
<div class="mj-stats">
    <div class="panel mj-card">
        <div class="mj-value">{{ number_format($ringkasan['dihasilkan_hari_ini'], 0, ',', '.') }} ton</div>
        <div class="mj-label">Limbah dihasilkan hari ini</div>
    </div>
    <div class="panel mj-card">
        <div class="mj-value">{{ number_format($ringkasan['total_stok'], 0, ',', '.') }} ton</div>
        <div class="mj-label">Total stok</div>
    </div>
    <div class="panel mj-card">
        <div class="mj-value">{{ number_format($ringkasan['terjual_5_hari'], 0, ',', '.') }} ton</div>
        <div class="mj-label">Terjual 5 hari</div>
    </div>
    <div class="panel mj-card">
        <div class="mj-value">Rp {{ number_format($ringkasan['pendapatan'], 0, ',', '.') }}</div>
        <div class="mj-label">Pendapatan</div>
    </div>
</div>

{{-- ===== Grafik dihasilkan & terjual per hari ===== --}}
<section class="panel">
    <div class="panel-head"><h2>Dihasilkan dan terjual per hari</h2></div>

    <div class="mj-chart" role="img" aria-label="Grafik batang limbah dihasilkan dan terjual per hari (ton)">
        @foreach ($grafik['hari'] as $h)
            <div class="mj-chart-day">
                <div class="mj-chart-bars">
                    <span class="mj-col mj-col--dihasilkan"
                        style="height: {{ round($h['dihasilkan'] / $grafik['maks'] * 100, 1) }}%"
                        data-val="{{ $h['dihasilkan'] ?: '' }}"
                        title="{{ $h['dihasilkan'] }} ton dihasilkan"></span>
                    <span class="mj-col mj-col--terjual"
                        style="height: {{ round($h['terjual'] / $grafik['maks'] * 100, 1) }}%"
                        data-val="{{ $h['terjual'] ?: '' }}"
                        title="{{ $h['terjual'] }} ton terjual"></span>
                </div>
                <div class="mj-chart-label">{{ $h['label'] }}</div>
            </div>
        @endforeach
    </div>

    <div class="mj-legend">
        <span><i class="mj-dot mj-dot--dihasilkan"></i>Dihasilkan</span>
        <span><i class="mj-dot mj-dot--terjual"></i>Terjual</span>
        <span class="mj-legend-note">dalam ton</span>
    </div>
</section>
