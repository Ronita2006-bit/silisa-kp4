@extends('layouts.app')

@section('title', 'Pengguna · SiLiSa')
@section('trail', 'Pengguna')
@section('page', 'pengguna')

@section('content')
<div class="page-head">
    <div>
        <p class="eyebrow">Data master</p>
        <h1>Pengguna</h1>
        <p>Kelola akun dan peran pengguna SiLiSa.</p>
    </div>
    <div class="actions">
        <a class="button" href="{{ route('pengguna.create') }}">+ Tambah pengguna</a>
    </div>
</div>

@if(session('success'))
    <div class="notice">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="notice">{{ session('error') }}</div>
@endif

<section class="panel">
    <div class="panel-head"><h2>Daftar pengguna</h2></div>
    <div class="table-scroll" tabindex="0" role="region" aria-label="Daftar pengguna">
        <table>
            <caption>Daftar pengguna</caption>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Peran</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengguna as $item)
                <tr>
                    <td>{{ $pengguna->firstItem() + $loop->index }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ ucfirst($item->peran) }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td>
                        <a class="button small" href="{{ route('pengguna.edit', $item) }}">Edit</a>
                        @if($item->id !== auth()->id())
                        <form action="{{ route('pengguna.status', $item) }}" method="POST" style="display:inline"
                              onsubmit="return confirm('{{ $item->status === 'aktif' ? 'Nonaktifkan' : 'Aktifkan' }} {{ $item->name }}?')">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="button small">
                                {{ $item->status === 'aktif' ? 'Nonaktifkan' : 'Aktifkan' }}
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="6">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

<div style="margin-top:1rem">
    {{ $pengguna->links() }}
</div>
@endsection