<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'SiLiSa')</title>
    <meta name="theme-color" content="#985444">
    <link rel="icon" href="{{ asset('template/img/favicon.svg') }}" type="image/svg+xml">
    <script>document.documentElement.classList.add('js');try{if(localStorage.getItem('aftercare-theme')==='dark')document.documentElement.classList.add('dark')}catch(e){}</script>
    <link rel="stylesheet" href="{{ asset('template/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
</head>
<body data-app="aftercare" data-name="SiLiSa" data-page="@yield('page', 'orders')">
<a class="skip-link" href="#main">Skip to main content</a>
<div class="shell">
    <aside class="rail">
        <a class="brand" href="{{ url('/') }}">
            <span class="mark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="m3 7 9-5 9 5v10l-9 5-9-5ZM3 7l9 5 9-5M12 12v10M7 4.8l10 5.5"/></svg></span>SiLiSa
        </a>
        <div class="workspace"><strong>SiLiSa</strong>Sistem Informasi</div>
        <div>
            <p class="eyebrow">Menu</p>
            <nav aria-label="Main navigation">
                <a href="{{ url('/') }}" @if(request()->is('/')) aria-current="page" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M9 5h12M9 12h12M9 19h12M3 5h1M3 12h1M3 19h1"/></svg><span>Dashboard</span>
                </a>
            </nav>
        </div>
        <div class="rail-foot"><strong>Ronita&livia</strong>Pengguna<br><span>Local workspace</span></div>
    </aside>

    <div class="content">
        <header class="topbar">
            <span class="trail">SiLiSa <span aria-hidden="true">/</span> @yield('trail', 'Dashboard')</span>
            <div class="top-actions">
                <button id="theme" type="button" aria-pressed="false">Dark mode</button>
                <span class="avatar" aria-label="Ronita&livia">RN</span>
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