@extends('layouts.app')

@section('title', 'Tambah Jenis Limbah · SiLiSa')
@section('trail', 'Jenis Limbah / Tambah')
@section('page', 'jenis-limbah')

@section('content')
<div class="page-head">
    <div>
        <p class="eyebrow">Data master</p>
        <h1>Tambah jenis limbah</h1>
    </div>
    <div class="actions">
        <a class="button" href="{{ route('jenis-limbah.index') }}">Kembali</a>
    </div>
</div>

<section class="panel">
    <div class="panel-head"><h2>Form jenis limbah</h2></div>
    <form action="{{ route('jenis-limbah.store') }}" method="POST" style="padding:1.25rem">
        @csrf
        @include('jenis-limbah._form', ['jenisLimbah' => null])
        <button type="submit" class="button" style="margin-top:1rem">Simpan</button>
    </form>
</section>
@endsection