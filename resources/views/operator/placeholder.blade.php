@extends('layouts.app')

@section('title', $judul . ' · SiLiSa')
@section('trail', $judul)
@section('page', 'operator')

@section('content')
<div class="page-head">
    <div>
        <p class="eyebrow">Operator</p>
        <h1>{{ $judul }}</h1>
        <p>Halaman ini akan diisi di langkah berikutnya.</p>
    </div>
</div>
@endsection