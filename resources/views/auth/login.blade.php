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
            <p>Catat limbah yang dihasilkan dan yang keluar, pantau stok otomatis, dan lihat laporan dalam satu tempat.
            </p>
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
        <p class="sub" id="sub-login">Pilih peran untuk melanjutkan.</p>

        @if ($errors->any())
            <div class="login-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ url('/login') }}" id="login-form">
            @csrf

            {{-- LANGKAH 1: pilih peran --}}
            <div id="langkah-peran" {{ $errors->any() ? 'hidden' : '' }}>
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

                <button type="button" class="login-btn" id="btn-lanjut">Lanjut</button>
            </div>

            {{-- LANGKAH 2: email dan password --}}
            <div id="langkah-akun" {{ $errors->any() ? '' : 'hidden' }}>
                <div class="peran-badge">
                    <span>Masuk sebagai <strong id="peran-terpilih">Operator</strong></span>
                    <button type="button" id="btn-ganti" class="link-ganti">Ganti peran</button>
                </div>

                <div class="login-field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email"
                        value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="email" required>
                </div>

                <div class="login-field">
                    <label for="password">Password</label>
                    <div class="pw-wrap">
                        <input type="password" id="password" name="password"
                            placeholder="Masukkan password" autocomplete="current-password" required>
                        <button type="button" id="btn-lihat" class="pw-toggle">Tampilkan</button>
                    </div>
                </div>

                <label class="login-remember">
                    <input type="checkbox" name="remember" value="1"> Ingat saya
                </label>

                <button type="submit" class="login-btn">Masuk</button>
            </div>
        </form>
    </div>
</main>

<script>
    (function () {
        var form = document.getElementById('login-form');
        var s1 = document.getElementById('langkah-peran');
        var s2 = document.getElementById('langkah-akun');
        var sub = document.getElementById('sub-login');
        var badge = document.getElementById('peran-terpilih');
        var pw = document.getElementById('password');
        var nama = { operator: 'Operator', manajer: 'Manajer', admin: 'Admin' };

        function peranDipilih() {
            return form.querySelector('input[name="peran"]:checked').value;
        }

        function langkah2() {
            badge.textContent = nama[peranDipilih()];
            s1.hidden = true;
            s2.hidden = false;
            sub.textContent = 'Masuk dengan email dan password akunmu.';
            document.getElementById('email').focus();
        }

        function langkah1() {
            s2.hidden = true;
            s1.hidden = false;
            sub.textContent = 'Pilih peran untuk melanjutkan.';
        }

        document.getElementById('btn-lanjut').addEventListener('click', langkah2);
        document.getElementById('btn-ganti').addEventListener('click', langkah1);

        document.getElementById('btn-lihat').addEventListener('click', function () {
            var tampil = pw.type === 'password';
            pw.type = tampil ? 'text' : 'password';
            this.textContent = tampil ? 'Sembunyikan' : 'Tampilkan';
        });

        // Tekan Enter di langkah 1 = Lanjut, bukan kirim form
        form.addEventListener('submit', function (e) {
            if (!s1.hidden) {
                e.preventDefault();
                langkah2();
            }
        });

        // Kalau login gagal, halaman langsung di langkah 2
        badge.textContent = nama[peranDipilih()];
        if (!s2.hidden) {
            sub.textContent = 'Masuk dengan email dan password akunmu.';
        }
    })();
</script>

</body>

</html>
