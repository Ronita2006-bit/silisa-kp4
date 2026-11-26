@extends('layouts.app')

@section('title', 'Dashboard · SiLiSa')
@section('trail', 'Dashboard')
@section('page', auth()->user()->peran === 'manajer' ? 'manajer-dashboard' : 'orders')

@section('content')
@if (auth()->user()->peran === 'manajer')

    {{-- Tampilan khusus manajer --}}
    @include('manajer.dashboard')

@else

    {{-- Tampilan lama untuk admin & operator (tidak diubah) --}}
    <div class="page-head">
        <div>
            <p class="eyebrow">SiLiSa</p>
            <h1>Selamat datang di SiLiSa</h1>
            <p>Ini halaman dashboard awal dengan template Aftercare.</p>
        </div>
    </div>

    <div class="stats" id="account-stats"></div>

    <section class="panel">
        <div class="panel-head"><h2>Data</h2></div>
        <div class="toolbar">
            <div class="field grow">
                <label for="order-search">Cari</label>
                <input type="search" id="order-search" placeholder="Ketik untuk mencari">
            </div>
        </div>
        <div class="table-scroll" tabindex="0" role="region" aria-label="Tabel data">
            <table>
                <caption>Tabel data</caption>
                <thead>
                    <tr><th scope="col">Order</th><th scope="col">Items</th><th scope="col">Total</th><th scope="col">Status</th><th scope="col">Details</th></tr>
                </thead>
                <tbody id="order-rows"></tbody>
            </table>
        </div>
    </section>

@endif
@endsection
