<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk · SiLiSa</title>
    <link rel="icon" type="image/png" href="{{ asset('template/img/Logo.png') }}">
    <link rel="stylesheet" href="{{ asset('template/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/login.css') }}">
</head>

<body class="login-page">

    <aside class="login-side">
        <div class="login-logo-wrap">
            <img src="{{ asset('template/img/Logo.png') }}" alt="SiLiSa" class="login-logo-img">
        </div>

        <div class="login-caption">
            <h2>Kelola limbah padat pabrik kelapa sawit dengan tertib.</h2>
            <p>Catat limbah yang dihasilkan dan yang keluar, pantau stok otomatis, dan lihat laporan dalam satu tempat.</p>
            <ul class="login-points">
                <li>Pencatatan limbah harian</li>
                <li>Stok otomatis</li>
                <li>Laporan untuk pimpinan</li>
            </ul>
        </div>
    </aside>

        <main class="login-main">
        <div class="login-card">
            <p class="eyebrow">SiLiSa</p>
            <h1>Masuk</h1>
            <p class="sub">Pilih peran untuk melihat tampilannya.</p>

            @if ($errors->any())
                <div class="login-error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <label class="peran-card">
                    <input type="radio" name="peran" value="operator"
                        {{ old('peran', 'operator') === 'operator' ? 'checked' : '' }}>
                    <span class="peran-judul">Operator</span>
                    <span class="peran-desk">Mencatat limbah harian dan penjualan keluar</span>
                </label>

                <label class="peran-card">
                    <input type="radio" name="peran" value="manajer"
                        {{ old('peran') === 'manajer' ? 'checked' : '' }}>
                    <span class="peran-judul">Manajer</span>
                    <span class="peran-desk">Melihat dashboard, stok, dan laporan</span>
                </label>

                <label class="peran-card">
                    <input type="radio" name="peran" value="admin"
                        {{ old('peran') === 'admin' ? 'checked' : '' }}>
                    <span class="peran-judul">Admin</span>
                    <span class="peran-desk">Mengelola semua data</span>
                </label>

                <button type="submit" class="login-btn">Masuk</button>
            </form>
        </div>
    </main>

</body>

</html>