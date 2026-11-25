@extends('layouts.app')

@section('title', 'Edit Pengguna · SiLiSa')
@section('trail', 'Pengguna / Edit')
@section('page', 'pengguna')

@section('content')
<div class="page-head">
    <div>
        <p class="eyebrow">Data master</p>
        <h1>Edit pengguna</h1>
    </div>
    <div class="actions">
        <a class="button" href="{{ route('pengguna.index') }}">Kembali</a>
    </div>
</div>

<section class="panel">
    <div class="panel-head"><h2>Form pengguna</h2></div>
    <form action="{{ route('pengguna.update', $pengguna) }}" method="POST" style="padding:1.25rem">
        @csrf
        @method('PUT')
        @include('pengguna._form')
        <button type="submit" class="button" style="margin-top:1rem">Perbarui</button>
    </form>
</section>
@endsection