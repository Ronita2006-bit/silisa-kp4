{{-- Layout baru SiLiSa. Sesuaikan jalur asset() dan nama route menu jika berbeda. --}}
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'SiLiSa')</title>
<link rel="icon" href="{{ asset('template/favicon.ico') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap">
<link rel="stylesheet" href="{{ asset('template/css/operator.css') }}">
<script>try{var t=localStorage.getItem('silisa-theme');if(t)document.documentElement.dataset.theme=t}catch(e){}</script>
<script src="{{ asset('template/js/operator.js') }}" defer></script>
</head>
<body>
<svg width="0" height="0" style="position:absolute"><defs>
<symbol id="plus" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></symbol>
<symbol id="up" viewBox="0 0 24 24"><path d="M7 17 17 7M8 7h9v9"/></symbol>
<symbol id="box" viewBox="0 0 24 24"><path d="m12 3 8 4.5v9L12 21l-8-4.5v-9zM4 7.5l8 4.5 8-4.5M12 12v9"/></symbol>
<symbol id="usr" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21c1-4 4-6 8-6s7 2 8 6"/></symbol>
<symbol id="bar" viewBox="0 0 24 24"><path d="M4 20h16M7 20v-7M12 20V6M17 20v-10"/></symbol>
<symbol id="drp" viewBox="0 0 24 24"><path d="M12 3c3 4 6 7 6 11a6 6 0 0 1-12 0c0-2 1-3.500 2-5 .5 1.500 1.500 2.500 2.500 3C11 10 11 6 12 3z"/></symbol>
<symbol id="hex" viewBox="0 0 24 24"><path d="m12 3 7.500 4.300v8.400L12 20l-7.500-4.300V7.300z"/></symbol>
<symbol id="al" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7.500v5.500M12 16.500v.01"/></symbol>
<symbol id="lf" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M3 21C3 11 9 4 21 3c0 11-6 17-16 17zM4 20 14 10" /></symbol>
</defs></svg>

@php
    $nav = [
        ['Catat limbah', 'plus', ['catat-limbah.index', 'catat-limbah']],
        ['Penjualan keluar', 'up', ['penjualan-keluar.index', 'penjualan-keluar']],
        ['Stok', 'box', ['stok.index', 'stok']],
        ['Pembeli', 'usr', ['pembeli.index', 'pembeli']],
        ['Dashboard', 'bar', ['dashboard']],
    ];
    $href = function ($names) {
        foreach ($names as $n) { if (Route::has($n)) return route($n); }
        return '#';
    };
@endphp
<aside>
  <div class="brand"><span class="logo" id="logo"></span><div><b>SiLiSa</b><small>Sistem Informasi Limbah Sawit</small></div></div>
  <div class="mh">MENU</div>
  <nav>
    @foreach ($nav as [$label, $icon, $names])
      @php $aktif = request()->routeIs(\Illuminate\Support\Str::before($names[0], '.') . '*'); @endphp
      <a href="{{ $href($names) }}" @class(['on' => $aktif]) @if ($aktif) aria-current="page" @endif><svg class="i"><use href="#{{ $icon }}"/></svg>{{ $label }}</a>
    @endforeach
  </nav>
  <div class="me">
    <b>{{ auth()->user()->name ?? 'Pengguna' }}</b><span>Operator</span><br>
    @if (Route::has('logout'))
      <form method="POST" action="{{ route('logout') }}">@csrf<button class="out" type="submit">Keluar</button></form>
    @endif
  </div>
  <div class="sf" id="sf"></div>
</aside>

<main>
  <div class="deco"><div class="f" id="f1"></div><div class="f f2" id="f2"></div></div>
  <div class="top">
    <div class="bc">SiLiSa / <b>@yield('trail')</b></div>
    <div class="tags"><button class="theme" id="theme" type="button" aria-pressed="false">Dark mode <b id="themeState">OFF</b></button><span class="tag d" id="today"></span></div>
  </div>
  @yield('content')
</main>
<div id="toast" role="status"></div>
</body>
</html>