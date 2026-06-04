<header class="header">
    <div class="mobile-nav"></div>
    <div class="header-inner">
        <!-- Logo Kiri -->
        <div class="logo-left">
            <a href="#">
                <img
                    src="{{ asset('assets/img/logo.jpeg') }}"
                    alt="Logo Kiri"
                    width="100"
                >
            </a>
        </div>
        <div class="main-menu">
            <nav class="navigation">
                <ul class="nav menu">
                    <li><a href="{{ route('index') }}">Beranda</a></li>
                    <li>
                        <a href="#">Profil<i class="icofont-rounded-down"></i></a>
                        <ul class="dropdown">
                            <li><a href="{{ route('profil') }}">Sejarah Perusahaan</a></li>
                            <li><a href="{{ route('struktur') }}">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Produk dan Layanan<i class="icofont-rounded-down"></i></a>
                        <ul class="dropdown">
                            <li><a href="{{ route('layanan.pupuk') }}">Layanan Pupuk</a></li>
                            <li><a href="{{ route('layanan.tbs') }}">Layanan TBS</a></li>
                            <li><a href="{{ route('layanan.simpanpinjam') }}">Layanan Simpan Pinjam</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('index') }}#blog">Pengumuman</a></li>
                    <li><a href="{{ route('index') }}#berita">Berita</a></li>
                    <li><a href="{{ route('index') }}#galeri">Galeri</a></li>
                    <li><a href="informasi/all_berita.html">Kontak</a></li>
                    <li class="ms-lg-3">
                        <a
                            {{-- href="{{ route('login') }}" --}}
                            class="btn btn-success rounded-pill px-4"
                        >
                            Login
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        {{-- <div class="logo-right">
            <img
                src="assets/img/pemda.png"
                alt="Logo Kanan"
                width="40"
                height="40"
            >
        </div> --}}
    </div>
</header>
