@php $u = $pengguna ?? null; @endphp

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
    <label for="name">Nama</label>
    <input type="text" id="name" name="name" value="{{ old('name', $u->name ?? '') }}" required>
</div>

<div class="field">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="{{ old('email', $u->email ?? '') }}" required>
</div>

<div class="field">
    <label for="peran">Peran</label>
    <select id="peran" name="peran" required>
        @foreach(['admin' => 'Admin', 'manajer' => 'Manajer', 'operator' => 'Operator'] as $nilai => $label)
            <option value="{{ $nilai }}" {{ old('peran', $u->peran ?? 'operator') === $nilai ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
</div>

<div class="field">
    <label for="password">Kata sandi {{ $u ? '(kosongkan jika tidak diganti)' : '' }}</label>
    <input type="password" id="password" name="password" {{ $u ? '' : 'required' }}>
</div>

<div class="field">
    <label for="password_confirmation">Ulangi kata sandi</label>
    <input type="password" id="password_confirmation" name="password_confirmation" {{ $u ? '' : 'required' }}>
</div>