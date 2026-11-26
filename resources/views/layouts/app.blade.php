<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'SiLiSa')</title>
    <meta name="theme-color" content="#985444">
    <link rel="icon" type="image/png" href="{{ asset('template/img/Logo.png') }}">
    <script>
        document.documentElement.classList.add('js');
        try {
            if (localStorage.getItem('aftercare-theme') === 'dark') document.documentElement.classList.add('dark')
        } catch (e) { }
    </script>
    <link rel="stylesheet" href="{{ asset('template/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/silisa.css') }}">
</head>

<body data-app="aftercare" data-name="SiLiSa" data-page="@yield('page', 'orders')">
    <a class="skip-link" href="#main">Skip to main content</a>
    <div class="shell">
        <aside class="rail">
            <a class="brand" href="{{ url('/') }}">
                <img src="{{ asset('template/img/Logo.png') }}" alt="SiLiSa"
                    style="height:48px;width:auto;mix-blend-mode:screen">
            </a>
            <div class="workspace"><strong>SiLiSa</strong>Sistem Informasi</div>
            <div>
                <p class="eyebrow">Menu</p>
                <nav aria-label="Main navigation">
                    @if (auth()->user()->peran === 'operator')
                        <a href="{{ route('catat-limbah') }}" @if (request()->is('catat-limbah*')) aria-current="page"
                        @endif>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                aria-hidden="true">
                                <path d="M12 5v14M5 12h14" />
                            </svg><span>Catat limbah</span>
                        </a>
                        <a href="{{ route('penjualan-keluar') }}" @if (request()->is('penjualan-keluar*'))
                        aria-current="page" @endif>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                aria-hidden="true">
                                <path d="M7 17L17 7M8 7h9v9" />
                            </svg><span>Penjualan keluar</span>
                        </a>
                        <a href="{{ route('stok') }}" @if (request()->is('stok*')) aria-current="page" @endif>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                aria-hidden="true">
                                <path d="M3 7l9-4 9 4-9 4-9-4zM3 7v10l9 4 9-4V7" />
                            </svg><span>Stok</span>
                        </a>
                        <a href="{{ route('pembeli') }}" @if (request()->is('pembeli*')) aria-current="page" @endif>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                aria-hidden="true">
                                <circle cx="9" cy="8" r="3.5" />
                                <path d="M2.5 20c0-3.6 2.9-6 6.5-6s6.5 2.4 6.5 6" />
                            </svg><span>Pembeli</span>
                        </a>
                    @endif
                    <a href="{{ url('/') }}" @if (request()->is('/')) aria-current="page" @endif>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                            aria-hidden="true">
                            <path d="M9 5h12M9 12h12M9 19h12M3 5h1M3 12h1M3 19h1" />
                        </svg><span>Dashboard</span>
                    </a>

                    {{-- ===== MENU MANAJER ===== --}}
                    @if (auth()->user()->peran === 'manajer')
                        <a href="{{ route('manajer.stok') }}" @if (request()->is('manajer/stok*')) aria-current="page"
                        @endif>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                aria-hidden="true">
                                <path d="M3 7l9-4 9 4-9 4-9-4zM3 7v10l9 4 9-4V7" />
                            </svg><span>Stok</span>
                        </a>
                        <a href="{{ route('laporan') }}" @if (request()->is('laporan*')) aria-current="page" @endif>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                aria-hidden="true">
                                <path d="M6 3h9l4 4v14H6zM14 3v5h5M9 13h7M9 17h7" />
                            </svg><span>Laporan</span>
                        </a>
                    @endif
                    {{-- ===== AKHIR MENU MANAJER ===== --}}

                    @if (auth()->user()->peran === 'admin')
                        <a href="{{ route('jenis-limbah.index') }}" @if (request()->is('jenis-limbah*')) aria-current="page"
                        @endif>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                aria-hidden="true">
                                <rect x="3" y="3" width="7" height="7" rx="1" />
                                <rect x="14" y="3" width="7" height="7" rx="1" />
                                <rect x="3" y="14" width="7" height="7" rx="1" />
                                <rect x="14" y="14" width="7" height="7" rx="1" />
                            </svg><span>Jenis Limbah</span>
                        </a>
                        <a href="{{ route('pengguna.index') }}" @if (request()->is('pengguna*')) aria-current="page" @endif>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                                aria-hidden="true">
                                <circle cx="9" cy="8" r="3.5" />
                                <path
                                    d="M2.5 20c0-3.6 2.9-6 6.5-6s6.5 2.4 6.5 6M17 11a3 3 0 1 0 0-6M18.5 14.3c2 .6 3.5 2.3 3.5 5.7" />
                            </svg><span>Pengguna</span>
                        </a>
                    @endif
                </nav>
            </div>
            <div class="rail-foot">
                <strong>{{ auth()->user()->name }}</strong>{{ ucfirst(auth()->user()->peran) }}<br>
                <form method="POST" action="{{ route('logout') }}" style="margin-top:.5rem">
                    @csrf
                    <button type="submit" class="button small">Keluar</button>
                </form>
            </div>
        </aside>

        <div class="content">
            <header class="topbar">
                <span class="trail">SiLiSa <span aria-hidden="true">/</span> @yield('trail', 'Dashboard')</span>
                <div class="top-actions">
                    <button id="theme" type="button" aria-pressed="false">Dark mode</button>
                    <span class="avatar"
                        aria-label="{{ auth()->user()->name }}">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span>
                </div>
            </header>

            <main class="main" id="main">
                @yield('content')
            </main>

            <footer class="footer">
                <p>SiLiSa &copy; {{ date('Y') }} · Template by <a href="https://uicookies.com/">uiCookies</a></p>
            </footer>
        </div>
    </div>

    <dialog id="dialog" aria-labelledby="dialog-title"></dialog>
    <div id="status" class="status" role="status" aria-live="polite"></div>
    <script src="{{ asset('template/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>
</body>

</html>
