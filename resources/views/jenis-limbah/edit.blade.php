@extends('layouts.app')

@section('title', 'Edit Jenis Limbah · SiLiSa')
@section('trail', 'Jenis Limbah / Edit')
@section('page', 'jenis-limbah')

@section('content')
<div class="page-head">
    <div>
        <p class="eyebrow">Data master</p>
        <h1>Edit jenis limbah</h1>
    </div>
    <div class="actions">
        <a class="button" href="{{ route('jenis-limbah.index') }}">Kembali</a>
    </div>
</div>

<section class="panel">
    <div class="panel-head"><h2>Form jenis limbah</h2></div>
    <form action="{{ route('jenis-limbah.update', $jenisLimbah) }}" method="POST" style="padding:1.25rem">
        @csrf
        @method('PUT')
        @include('jenis-limbah._form')
        <button type="submit" class="button" style="margin-top:1rem">Perbarui</button>
    </form>
</section>
@endsection