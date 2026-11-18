@php $j = $jenisLimbah ?? null; @endphp

@if($errors->any())
    <div class="notice">
        <ul style="margin:0;padding-left:1.2rem">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="field">
    <label for="nama">Nama</label>
    <input type="text" id="nama" name="nama" value="{{ old('nama', $j->nama ?? '') }}" required>
</div>

<div class="field">
    <label for="satuan">Satuan</label>
    <input type="text" id="satuan" name="satuan" value="{{ old('satuan', $j->satuan ?? 'ton') }}" required>
</div>

<div class="field">
    <label for="persen_acuan">Persentase acuan terhadap TBS (%)</label>
    <input type="number" step="0.01" min="0" max="100" id="persen_acuan" name="persen_acuan" value="{{ old('persen_acuan', $j->persen_acuan ?? '') }}" required>
</div>

<div class="field">
    <label for="kapasitas">Kapasitas penyimpanan</label>
    <input type="number" step="0.01" min="0" id="kapasitas" name="kapasitas" value="{{ old('kapasitas', $j->kapasitas ?? '') }}" required>
</div>

<div class="field">
    <label for="harga_default">Harga default per ton (boleh kosong)</label>
    <input type="number" step="0.01" min="0" id="harga_default" name="harga_default" value="{{ old('harga_default', $j->harga_default ?? '') }}">
</div>

<div class="field">
    <label>
        <input type="checkbox" name="aktif" value="1" {{ old('aktif', $j->aktif ?? true) ? 'checked' : '' }}>
        Aktif
    </label>
</div>