@extends('layouts.app')

@section('title', 'Jenis Limbah · SiLiSa')
@section('trail', 'Jenis Limbah')
@section('page', 'jenis-limbah')

@section('content')
<div class="page-head">
    <div>
        <p class="eyebrow">Data master</p>
        <h1>Jenis Limbah</h1>
        <p>Kelola jenis limbah padat, persentase acuan, kapasitas, dan harga default.</p>
    </div>
    <div class="actions">
        <a class="button" href="{{ route('jenis-limbah.create') }}">+ Tambah jenis limbah</a>
    </div>
</div>

@if(session('success'))
    <div class="notice">{{ session('success') }}</div>
@endif

<section class="panel">
    <div class="panel-head"><h2>Daftar jenis limbah</h2></div>
    <div class="table-scroll" tabindex="0" role="region" aria-label="Daftar jenis limbah">
        <table>
            <caption>Daftar jenis limbah</caption>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Acuan (%)</th>
                    <th scope="col">Kapasitas</th>
                    <th scope="col">Harga default</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jenisLimbah as $item)
                <tr>
                    <td>{{ $jenisLimbah->firstItem() + $loop->index }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->satuan }}</td>
                    <td>{{ rtrim(rtrim(number_format($item->persen_acuan, 2, ',', '.'), '0'), ',') }}</td>
                    <td>{{ number_format($item->kapasitas, 0, ',', '.') }} {{ $item->satuan }}</td>
                    <td>{{ $item->harga_default !== null ? 'Rp ' . number_format($item->harga_default, 0, ',', '.') : '-' }}</td>
                    <td>{{ $item->aktif ? 'Aktif' : 'Nonaktif' }}</td>
                    <td>
                        <a class="button small" href="{{ route('jenis-limbah.edit', $item) }}">Edit</a>
                        <form action="{{ route('jenis-limbah.destroy', $item) }}" method="POST" style="display:inline"
                              onsubmit="return confirm('Hapus {{ $item->nama }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button small">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

<div style="margin-top:1rem">
    {{ $jenisLimbah->links() }}
</div>
@endsection