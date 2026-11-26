<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Masuk · SiLiSa</title>
<meta name="theme-color" content="#2a1b15">
<link rel="icon" type="image/png" href="{{ asset('template/img/Logo.png') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&family=Newsreader:wght@500;600&display=swap">
<link rel="stylesheet" href="{{ asset('template/css/login.css') }}">
</head>
<body>
<main class="page">
  <section class="hero" id="hero">

    <!-- ===== SiLiSa BG: HTML ===== -->
    <div class="silisa-bg" aria-hidden="true">
      <i class="blob b1"></i><i class="blob b2"></i><i class="blob b3"></i>
      <div class="rays"></div>
      <svg class="mark" viewBox="0 0 200 200" fill="none" stroke="currentColor" stroke-width="7" stroke-linecap="round" stroke-linejoin="round">
        <g id="sb-arc"><path d="M100 22A78 78 0 0 1 167.5 61"/><path d="M168.3 44.4L167.5 61L152.7 53.4"/></g>
        <use href="#sb-arc" transform="rotate(120 100 100)"/><use href="#sb-arc" transform="rotate(240 100 100)"/>
      </svg>
      <div class="spot"></div>

      <div class="mill">
        <svg viewBox="0 0 1000 400" preserveAspectRatio="none">
          <defs>
            <g id="sb-palm" fill="none" stroke-linecap="round">
              <path d="M0 0C3-30-3-60 3-90" stroke-width="5"/>
              <g transform="translate(3 -90)" stroke-width="3.2">
                <path d="M0 0Q24-24 52-2"/><path d="M0 0Q24-24 52-2" transform="rotate(-38)"/><path d="M0 0Q24-24 52-2" transform="rotate(-76)"/><path d="M0 0Q24-24 52-2" transform="rotate(-116)"/><path d="M0 0Q24-24 52-2" transform="rotate(-152)"/><path d="M0 0Q24-24 52-2" transform="rotate(-184)"/><path d="M0 0Q24-24 52-2" transform="rotate(34)"/><path d="M0 0Q24-24 52-2" transform="rotate(146)"/>
              </g>
            </g>
            <radialGradient id="sb-sun"><stop offset="0" stop-color="#fff1cf" stop-opacity=".95"/><stop offset=".28" stop-color="#ffbd6b" stop-opacity=".65"/><stop offset="1" stop-color="#ff8a3d" stop-opacity="0"/></radialGradient>
            <linearGradient id="sb-wall" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#6e4636"/><stop offset="1" stop-color="#2c1911"/></linearGradient>
            <linearGradient id="sb-cyl" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#6e4a39"/><stop offset=".3" stop-color="#c8967a"/><stop offset=".62" stop-color="#6b4635"/><stop offset="1" stop-color="#2a1710"/></linearGradient>
            <linearGradient id="sb-sil" x1="0" y1="0" x2="1" y2="0"><stop offset="0" stop-color="#2a1710"/><stop offset=".55" stop-color="#6a4333"/><stop offset=".9" stop-color="#cf9068"/><stop offset="1" stop-color="#8a5a43"/></linearGradient>
            <linearGradient id="sb-tkks" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#9a6638"/><stop offset="1" stop-color="#3b2312"/></linearGradient>
            <linearGradient id="sb-cs" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#5a443a"/><stop offset="1" stop-color="#17100d"/></linearGradient>
            <linearGradient id="sb-sr" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#c79a50"/><stop offset="1" stop-color="#5a4122"/></linearGradient>
            <linearGradient id="sb-gnd" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#000" stop-opacity="0"/><stop offset="1" stop-color="#000" stop-opacity=".6"/></linearGradient>
            <radialGradient id="sb-lamp"><stop offset="0" stop-color="#ffe2a8" stop-opacity=".95"/><stop offset="1" stop-color="#ffb35a" stop-opacity="0"/></radialGradient>
            <linearGradient id="sb-cone" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffd58f" stop-opacity=".4"/><stop offset="1" stop-color="#ffd58f" stop-opacity="0"/></linearGradient>
            <filter id="sb-blur" x="-60%" y="-60%" width="220%" height="220%"><feGaussianBlur stdDeviation="3.5"/></filter>
          </defs>
          <circle class="sun" cx="610" cy="340" r="260" fill="url(#sb-sun)"/>
          <path d="M0 400V292Q140 250 290 286T560 280T820 288T1000 266V400Z" fill="#7a4632" opacity=".5"/>
          <path d="M0 400V318Q160 286 330 314T640 308T1000 300V400Z" fill="#4a2c20" opacity=".9"/>
          <g fill="#4c2f22" opacity=".9"><rect x="250" y="270" width="64" height="62"/><rect x="262" y="246" width="20" height="26"/><rect x="326" y="284" width="48" height="50"/><rect x="612" y="252" width="86" height="80"/><rect x="760" y="274" width="44" height="58"/><rect x="452" y="292" width="36" height="40"/><polygon points="330,332 333,236 341,236 344,332"/></g>
          <g stroke="#5a3526"><g transform="translate(300 332) scale(.8)"><use class="palm" href="#sb-palm"/></g><g transform="translate(968 336) scale(.8)"><use class="palm" href="#sb-palm" style="animation-delay:-2s"/></g></g>

          <g stroke="rgba(255,190,140,.32)" stroke-width="1.2">
            <rect x="34" y="250" width="128" height="102" fill="url(#sb-wall)"/><polygon points="28,250 42,232 154,232 168,250" fill="#3a2218"/>
            <polygon points="190,352 193,176 205,176 208,352" fill="url(#sb-sil)"/><rect x="191" y="170" width="16" height="7" fill="#4a2d20"/>
            <polygon points="124,352 131,92 149,92 156,352" fill="url(#sb-sil)"/><rect x="127" y="82" width="26" height="10" fill="#4a2d20"/>
            <rect x="214" y="268" width="168" height="36" rx="18" fill="url(#sb-cyl)"/><rect x="214" y="310" width="168" height="36" rx="18" fill="url(#sb-cyl)"/>
            <rect x="250" y="256" width="8" height="13" fill="#3a2218"/><rect x="330" y="256" width="8" height="13" fill="#3a2218"/>
            <rect x="408" y="188" width="48" height="164" fill="url(#sb-sil)"/><path d="M408 188a24 24 0 0 1 48 0z" fill="url(#sb-sil)"/>
            <rect x="462" y="214" width="42" height="138" fill="url(#sb-sil)"/><path d="M462 214a21 21 0 0 1 42 0z" fill="url(#sb-sil)"/>
            <rect x="510" y="252" width="36" height="100" fill="url(#sb-sil)"/><rect x="507" y="248" width="42" height="6" fill="#4a2d20"/>
            <polygon points="566,352 566,266 604,234 604,266 642,234 642,266 680,234 680,266 718,266 718,352" fill="url(#sb-wall)"/>
            <rect x="738" y="156" width="60" height="196" fill="url(#sb-wall)"/><rect x="732" y="138" width="72" height="20" fill="#4a2d20"/><rect x="758" y="104" width="14" height="36" fill="url(#sb-sil)"/>
          </g>
          <g fill="#c8553a" opacity=".95"><polygon points="130.57,108 149.43,108 149.86,124 130.14,124"/><polygon points="129.6,144 150.4,144 150.83,160 129.17,160"/><polygon points="128.63,180 151.37,180 151.8,196 128.2,196"/></g>
          <g fill="rgba(255,205,130,.38)"><polygon points="566,268 604,236 604,246 566,278"/><polygon points="604,268 642,236 642,246 604,278"/><polygon points="642,268 680,236 680,246 642,278"/></g>
          <g stroke="rgba(0,0,0,.32)" fill="none"><path d="M250 268v36M286 268v36M322 268v36M358 268v36M250 310v36M286 310v36M322 310v36M358 310v36M408 232h48M408 276h48M408 318h48M462 250h42M462 290h42M462 328h42"/><line x1="133" y1="100" x2="127" y2="340" stroke-dasharray="2 5"/></g>
          <line x1="512" y1="334" x2="738" y2="200" stroke="#1d0f0a" stroke-width="12"/><line class="belt" x1="512" y1="334" x2="738" y2="200" stroke="#f0a35a" stroke-width="3"/>
          <g stroke="#1d0f0a" stroke-width="4"><line x1="548" y1="313" x2="548" y2="352"/><line x1="708" y1="218" x2="708" y2="266"/></g>
          <g fill="#8a5a34"><rect x="-6" y="-13" width="12" height="8" rx="2"><animateMotion path="M512 334L738 200" dur="6s" repeatCount="indefinite" rotate="auto"/></rect><rect x="-6" y="-13" width="12" height="8" rx="2"><animateMotion path="M512 334L738 200" dur="6s" begin="-2s" repeatCount="indefinite" rotate="auto"/></rect><rect x="-6" y="-13" width="12" height="8" rx="2"><animateMotion path="M512 334L738 200" dur="6s" begin="-4s" repeatCount="indefinite" rotate="auto"/></rect></g>
          <path d="M868 352Q932 232 1000 352Z" fill="url(#sb-cs)"/><path d="M786 352Q846 258 912 352Z" fill="url(#sb-tkks)"/><path d="M742 352Q780 306 830 352Z" fill="url(#sb-sr)"/>
          <path d="M806 336Q842 282 876 322M892 324Q932 262 966 318M758 340Q782 316 806 334" fill="none" stroke="rgba(255,200,140,.5)" stroke-width="2" stroke-linecap="round"/>
          <g fill="rgba(255,205,150,.45)"><circle cx="840" cy="326" r="2"/><circle cx="858" cy="340" r="1.6"/><circle cx="930" cy="312" r="2"/><circle cx="950" cy="336" r="1.8"/><circle cx="780" cy="338" r="1.6"/><circle cx="905" cy="342" r="1.6"/></g>
          <g id="sb-wg" fill="#ffb04a" filter="url(#sb-blur)" opacity=".9"></g><g id="sb-wins" fill="#ffd98a"></g>
          <g><polygon points="388,284 396,284 436,352 348,352" fill="url(#sb-cone)"/><line x1="392" y1="352" x2="392" y2="282" stroke="#1d0f0a" stroke-width="3"/><circle class="lamp" cx="392" cy="282" r="18" fill="url(#sb-lamp)"/><circle cx="392" cy="281" r="3" fill="#fff0c8"/></g>
          <g><polygon points="718,290 726,290 770,352 674,352" fill="url(#sb-cone)"/><line x1="722" y1="352" x2="722" y2="288" stroke="#1d0f0a" stroke-width="3"/><circle class="lamp" cx="722" cy="288" r="18" fill="url(#sb-lamp)" style="animation-delay:-2s"/><circle cx="722" cy="287" r="3" fill="#fff0c8"/></g>
          <circle class="blink" cx="140" cy="76" r="4" fill="#ff5a3c"/><circle class="blink" cx="765" cy="98" r="3.4" fill="#ff5a3c" style="animation-delay:-1s"/>
          <g transform="translate(14 352) scale(1.4)" stroke="#2a160f"><use class="palm" href="#sb-palm"/></g>
          <rect x="0" y="334" width="1000" height="18" fill="url(#sb-gnd)"/>
          <rect x="0" y="352" width="1000" height="48" fill="#140b08"/><rect x="0" y="352" width="1000" height="7" fill="#3a2418"/><rect x="0" y="352" width="1000" height="1.5" fill="rgba(255,190,140,.4)"/>
          <line x1="0" y1="378" x2="1000" y2="378" stroke="rgba(255,235,200,.38)" stroke-width="1.6" stroke-dasharray="26 18"/><rect x="0" y="392" width="1000" height="8" fill="#0b0504"/>
        </svg>
        <i class="puff"></i><i class="puff"></i><i class="puff"></i><i class="puff"></i>
        <i class="puff s" style="left:25.6%"></i><i class="puff s" style="left:33.5%;animation-delay:-4s"></i>
        <svg class="truck" viewBox="0 0 200 92">
          <defs>
            <linearGradient id="sb-beam" x1="0" x2="1"><stop offset="0" stop-color="#ffe6b0" stop-opacity=".6"/><stop offset="1" stop-color="#ffe6b0" stop-opacity="0"/></linearGradient>
            <linearGradient id="sb-body" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#e57a52"/><stop offset="1" stop-color="#a8442b"/></linearGradient>
            <linearGradient id="sb-glass" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#ffeccb"/><stop offset="1" stop-color="#b98055"/></linearGradient>
            <radialGradient id="sb-shd"><stop offset="0" stop-color="#000" stop-opacity=".6"/><stop offset="1" stop-color="#000" stop-opacity="0"/></radialGradient>
          </defs>
          <ellipse cx="100" cy="86" rx="100" ry="6" fill="url(#sb-shd)"/>
          <polygon points="184,57 300,38 300,84" fill="url(#sb-beam)"/>
          <rect x="6" y="62" width="180" height="9" rx="2" fill="#1c110c"/>
          <path d="M16 30Q22 6 50 10Q70 0 92 12Q112 12 118 30Z" fill="#7a4d2c"/>
          <path d="M30 20l7 4M52 14l6 5M74 12l7 4M96 18l6 3M46 24l8 3" stroke="#b27544" stroke-width="2.2" stroke-linecap="round"/>
          <path d="M10 28H120L128 60H16Z" fill="url(#sb-body)" stroke="rgba(255,205,165,.55)"/>
          <path d="M10 28H120" stroke="#ffcf9a" stroke-width="3" stroke-linecap="round"/>
          <path d="M36 29l3 31M62 29l3 31M88 29l3 31" stroke="rgba(60,20,10,.45)" stroke-width="2"/>
          <path d="M14 48H125L126 53H15Z" fill="#f0b45e"/>
          <rect x="120" y="4" width="6" height="36" rx="1" fill="#2a1710"/><rect x="118" y="2" width="10" height="4" rx="1" fill="#3a2218"/>
          <path d="M128 30H156L176 52H186V64H128Z" fill="url(#sb-body)" stroke="rgba(255,205,165,.55)"/>
          <path d="M135 35H153L168 51H135Z" fill="url(#sb-glass)"/><path d="M135 35H146L142 51H135Z" fill="#fff" opacity=".28"/>
          <rect x="180" y="57" width="8" height="8" rx="1" fill="#1c110c"/><circle cx="185" cy="57" r="3.4" fill="#fff2c8"/><rect x="8" y="50" width="3" height="7" fill="#ff4b3a"/>
          <g fill="#17100d" stroke="#4a342a" stroke-width="1.2"><circle cx="30" cy="72" r="13"/><circle cx="54" cy="72" r="13"/><circle cx="152" cy="72" r="13"/></g>
          <g fill="#cfae92"><circle cx="30" cy="72" r="6.5"/><circle cx="54" cy="72" r="6.5"/><circle cx="152" cy="72" r="6.5"/></g>
          <g class="wh" stroke="#7a553f" stroke-width="1.6"><path d="M30 66v12M24 72h12"/></g><g class="wh" stroke="#7a553f" stroke-width="1.6"><path d="M54 66v12M48 72h12"/></g><g class="wh" stroke="#7a553f" stroke-width="1.6"><path d="M152 66v12M146 72h12"/></g>
          <g fill="#5a3a2c"><circle cx="30" cy="72" r="2.4"/><circle cx="54" cy="72" r="2.4"/><circle cx="152" cy="72" r="2.4"/></g>
        </svg>
      </div>

      <canvas id="sb-fx"></canvas>
      <div class="shade"></div>
    </div>
    <!-- ===== akhir HTML SiLiSa BG ===== -->

    <div class="flow rise" style="--i:0" aria-hidden="true">
      <span class="node"><i></i>Hasil harian</span><span class="track"></span>
      <span class="node"><i></i>Stok otomatis</span><span class="track"></span>
      <span class="node"><i></i>Keluar</span>
    </div>

    <!-- ===== Logo FX ===== -->
    <div class="logo-stage">
      <div class="logo-wrap" id="logoWrap">
        <svg class="orbit" viewBox="0 0 1000 330" fill="none" aria-hidden="true">
          <g class="ring"><g transform="rotate(-7 500 165)"><ellipse cx="500" cy="165" rx="470" ry="132" stroke="rgba(255,190,140,.3)" stroke-dasharray="3 9"/><circle r="4.5" fill="#e08a3c"><animateMotion dur="16s" repeatCount="indefinite" path="M30 165a470 132 0 1 0 940 0a470 132 0 1 0 -940 0"/></circle></g></g>
          <g transform="rotate(9 500 165)"><ellipse cx="500" cy="165" rx="440" ry="104" stroke="rgba(224,138,60,.25)" stroke-dasharray="2 12"/><circle r="3.6" fill="#ffd9a0"><animateMotion dur="11s" repeatCount="indefinite" path="M560 165a440 104 0 1 1 -880 0a440 104 0 1 1 880 0"/></circle></g>
        </svg>
        <img class="logo" id="logoImg" src="{{ asset('template/img/Logo.png') }}" alt="SiLiSa – Sistem Informasi Limbah Sawit">
        <span class="shine"></span>
        <i class="sp" style="left:23%;top:52%"></i><i class="sp" style="left:62%;top:14%;animation-delay:-1.4s"></i><i class="sp" style="left:93%;top:46%;animation-delay:-2.6s"></i><i class="sp" style="left:8%;top:30%;animation-delay:-3.4s"></i>
        <span class="chip c1" style="--c:#c48a52">Tandan kosong</span><span class="chip c2" style="--c:#e08a3c">Cangkang</span>
        <span class="chip c3" style="--c:#e0b868">Serat</span><span class="chip c4" style="--c:#cdbfb3">Abu boiler</span>
      </div>
    </div>

    <div class="pitch rise" style="--i:4">
      <span class="eyebrow">Limbah padat pabrik kelapa sawit</span>
      <h2><span class="w" style="--w:0">Dari</span> <span class="w" style="--w:1">limbah,</span> <span class="w" style="--w:2"><em>jadi nilai.</em></span></h2>
      <p>Catat limbah yang dihasilkan dan yang keluar, pantau stok otomatis, dan lihat laporan dalam satu tempat.</p>
      <ul><li>Pencatatan limbah harian</li><li>Stok otomatis</li><li>Laporan untuk pimpinan</li></ul>
    </div>
  </section>

  <section class="side">
    <i class="fl" style="left:12%;animation-delay:0s"></i><i class="fl" style="left:28%;animation-delay:-4s;width:4px;height:4px"></i><i class="fl" style="left:46%;animation-delay:-8s"></i><i class="fl" style="left:63%;animation-delay:-2s;width:4px;height:4px"></i><i class="fl" style="left:80%;animation-delay:-10s"></i><i class="fl" style="left:92%;animation-delay:-6s;width:4px;height:4px"></i>
    <form class="card rise" style="--i:2" method="POST" action="{{ url('/login') }}" id="login-form">
      @csrf
      <span class="badge-f"><i></i>Akses sesuai peran</span>
      <span class="pill"><i></i>Portal SiLiSa</span>
      <h2>Masuk</h2>
      <p id="sub-login">Pilih peran untuk melanjutkan.</p>
      @if ($errors->any())
      <div class="alert" role="alert"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 8v5M12 16.5v.01"/></svg><span>{{ $errors->first() }}</span></div>
      @endif

      {{-- LANGKAH 1: pilih peran --}}
      <div id="langkah-peran" {{ $errors->any() ? 'hidden' : '' }}>
      <label class="role"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3h6v3H9zM7 5H6a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1M8 12h8M8 16h5"/></svg></span><div><b>Operator</b><span>Mencatat limbah harian dan penjualan keluar</span></div><input type="radio" name="peran" value="operator" {{ old('peran','operator') === 'operator' ? 'checked' : '' }}></label>
      <label class="role"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20V11M10 20V4M16 20v-7M22 20H2"/></svg></span><div><b>Manajer</b><span>Melihat dashboard, stok, dan laporan</span></div><input type="radio" name="peran" value="manajer" {{ old('peran','operator') === 'manajer' ? 'checked' : '' }}></label>
      <label class="role"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6zM9 12l2 2 4-4"/></svg></span><div><b>Admin</b><span>Mengelola semua data</span></div><input type="radio" name="peran" value="admin" {{ old('peran','operator') === 'admin' ? 'checked' : '' }}></label>
        <button class="go" type="button" id="btn-lanjut"><span class="lbl">Lanjut</span><svg class="arr" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></button>
      </div>

      {{-- LANGKAH 2: email dan password --}}
      <div id="langkah-akun" {{ $errors->any() ? '' : 'hidden' }}>
        <div class="badge-peran"><span>Masuk sebagai <strong id="peran-terpilih">Operator</strong></span><button type="button" id="btn-ganti" class="link-ganti">Ganti peran</button></div>
        <div class="fld"><label for="email">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="email" required></div>
        <div class="fld"><label for="password">Password</label>
          <div class="pw-wrap"><input type="password" id="password" name="password" placeholder="Masukkan password" autocomplete="current-password" required>
          <button type="button" id="btn-lihat" class="pw-toggle">Tampilkan</button></div></div>
        <label class="remember"><input type="checkbox" name="remember" value="1"> Ingat saya</label>
        <button class="go" type="submit" id="goBtn"><span class="lbl">Masuk</span><svg class="arr" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg><i class="spin" aria-hidden="true"></i></button>
      </div>

      <div class="foot">&copy; {{ date('Y') }} <b>SiLiSa</b> &middot; Politeknik Caltex Riau</div>
    </form>
  </section>
</main>

<script src="{{ asset('template/js/login.js') }}"></script>
</body>
</html>