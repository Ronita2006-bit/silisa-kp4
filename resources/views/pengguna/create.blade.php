@extends('layouts.app')

@section('title', 'Tambah Pengguna · SiLiSa')
@section('trail', 'Pengguna / Tambah')
@section('page', 'pengguna')

@section('content')
<div class="page-head">
    <div>
        <p class="eyebrow">Data master</p>
        <h1>Tambah pengguna</h1>
    </div>
    <div class="actions">
        <a class="button" href="{{ route('pengguna.index') }}">Kembali</a>
    </div>
</div>

<section class="panel">
    <div class="panel-head"><h2>Form pengguna</h2></div>
    <form action="{{ route('pengguna.store') }}" method="POST" style="padding:1.25rem">
        @csrf
        @include('pengguna._form', ['pengguna' => null])
        <button type="submit" class="button" style="margin-top:1rem">Simpan</button>
    </form>
</section>
@endsection