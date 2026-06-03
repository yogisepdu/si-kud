@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    <style>
        @media (max-width: 768px) {
            .single-slider {
                height: 200px !important;
                /* Sesuaikan tinggi */
            }

            .single-slider img {
                height: 100% !important;
                object-fit: cover;
            }

            .hero-slider,
            .slider {
                height: auto !important;
            }

            .owl-item:empty {
                display: none !important;
            }
        }
    </style>
    <section class="slider">
        <div class="hero-slider">
            <div class="single-slider">
                <img
                    src="assets/img/slider_core1.png"
                    alt="Slider 1"
                >
            </div>
            <div class="single-slider">
                <img
                    src="assets/img/slide_tabungan.png"
                    alt="Slider 2"
                >
            </div>
            <div class="single-slider">
                <img
                    src="assets/img/slide_pembiayaan.png"
                    alt="Slider 3"
                >
            </div>
        </div>
    </section>
    <div class="marquee-container">
        <div class="marquee-text">
            Selamat datang di Website Resmi Bank Syariah Berkah, Hijrah Menjadi Mudah bersama Bank Syariah Berkah. Masya
            Allah... #nyamandalamkeberkahan
        </div>
    </div>
    <br>
    <section
        class="blog section"
        id="blog"
    >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h1 style="color: #01A85A; margin-bottom: 0px;"><b>PENGUMUMAN DAN INFOMASI</h1>
                        <p style="color: #01A85A; margin-top: 0px;">Bank Syariah Berkah Selalu Berkontribusi Untuk
                            Memberikan Pengumuman Dan Informasi Terbaru</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-head">
                            <img
                                src="assets/img/foto_informasi/info_loker_april_2026.png"
                                alt="loker_2026"
                            >
                        </div>
                        <div class="news-body">
                            <div class="news-content">
                                <h2><a>LOKER APRIL 2026</a></h2>
                                <p class="text">Silahkan Upload Berkas di menu Karir atau Di Antar Langsung Ke Kantor
                                    Pusat.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-head">
                            <img
                                src="assets/img/foto_informasi/informasi_lps.png"
                                alt="jaminan_dari_lps"
                            >
                        </div>
                        <div class="news-body">
                            <div class="news-content">
                                <h2><a>PENJAMINAN OLEH LPS</a></h2>
                                <p class="text">Maksimum nilai simpanan yang dijamin LPS per
                                    nasabah per bank adalah Rp 2 miliar</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-head">
                            <img
                                src="assets/img/foto_informasi/pembiayaan_mobil.jpg"
                                alt="pembiayaan_mobil"
                            >
                        </div>
                        <div class="news-body">
                            <div class="news-content">
                                <h2><a>PEMBIAYAAN MOBIL</a></h2>
                                <p class="text">DP Ringan, Akad Syariah dan Bebas Riba</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-head">
                            <img
                                src="assets/img/foto_informasi/pembiayaan_sepeda_motor.jpg"
                                alt="pembiayaan_sepeda_motor"
                            >
                        </div>
                        <div class="news-body">
                            <div class="news-content">
                                <h2><a>PEMBIAYAAN SEPEDA MOTOR</a></h2>
                                <p class="text">DP Ringan, Akad Syariah dan Bebas Riba</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-head">
                            <img
                                src="assets/img/foto_informasi/pembiayaan_kebun.jpg"
                                alt="pembiayaan_kebun"
                            >
                        </div>
                        <div class="news-body">
                            <div class="news-content">
                                <h2><a>PEMBIAYAAN KEBUN, LAHAN DAN LAIN-LAIN</a></h2>
                                <p class="text">Akad Syariah dan Bebas Riba</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-head">
                            <img
                                src="assets/img/foto_informasi/pembiayaan_bangunan.jpg"
                                alt="pembiayaan_bangunan"
                            >
                        </div>
                        <div class="news-body">
                            <div class="news-content">
                                <h2><a>PEMBIAYAAN BANGUNAN, RUMAH DAN LAIN - LAIN</a></h2>
                                <p class="text">Akad Syariah dan Bebas Riba</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-head">
                            <img
                                src="assets/img/foto_informasi/top_bumd_2025.png"
                                alt="top_bumd_2025"
                            >
                        </div>
                        <div class="news-body">
                            <div class="news-content">
                                <h2><a>TOP BUMD 2025</a></h2>
                                <p class="text">Bank Syariah Berkah Meraih TOP BUMD 2025</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Blog Area -->
    <style>
        #blog {
            padding-top: 20px;
            /* Sesuaikan, bisa dikurangi jadi 0 kalau perlu */
            margin-top: 5px;
            /* Ini yang 'narik' ke atas */
        }

        @media (max-width: 768px) {
            #blog {
                margin-top: 10px;
                /* Bisa lebih ekstrim nariknya di mobile */
                padding-top: 10px;
            }

            .section-title h1 {
                font-size: 20px;
            }

            .section-title p {
                font-size: 14px;
            }

            .news-content h2 {
                font-size: 16px;
            }

            .news-content a {
                font-size: 14px;
            }
        }
    </style>
    <section
        class="blog section"
        id="blog"
    >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h1 style="color: #01A85A; margin-bottom: 0px;"><b>BERITA TERBARU</h1>
                        <p style="color: #01A85A; margin-top: 0px;">Bank Syariah Berkah Selalu Berkontribusi Untuk
                            Memberikan Berita Terbaru</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <!-- KONTEN BERITA -->
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-head">
                            <img
                                src="assets/img/foto_berita/imsakiyah_2025.jpg"
                                alt="#"
                            >
                        </div>
                        <div class="news-body">
                            <div class="news-content">
                                <div class="date">27 Februari 2025</div>
                                <h2><a href="informasi/jadwal_imsakiyah_27_02_2025.html">Jadwal Imsyakiyah Bulan Ramadhan
                                        1446H/2025</a></h2>
                                <a href="informasi/jadwal_imsakiyah_27_02_2025.html">Baca Selengkapnya <i
                                        class="fa fa-long-arrow-right"
                                    ></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-head">
                            <img
                                src="assets/img/foto_berita/pengumuman_perubahan_nama_13_2_2025.png"
                                alt="#"
                            >
                        </div>
                        <div class="news-body">
                            <div class="news-content">
                                <div class="date">13 Februari 2025</div>
                                <h2><a href="informasi/pengumuman_perubahan_nama_13_02_2025.html">Pengumuman Perubahan Dari
                                        Nama "PEMBIAYAAN" Ke "PEREKONOMIAN"</a></h2>
                                <a href="informasi/pengumuman_perubahan_nama_13_02_2025.html">Baca Selengkapnya <i
                                        class="fa fa-long-arrow-right"
                                    ></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-head">
                            <img
                                src="assets/img/foto_berita/rupslb16_12_2024.jpg"
                                alt="#"
                            >
                        </div>
                        <div class="news-body">
                            <div class="news-content">
                                <div class="date">16 Desember 2024</div>
                                <h2><a href="informasi/rupslb16_12_2024.html">Pj Bupati Kampar Hambali, SE,MBA,MH Hadiri
                                        RUPSLB PT. BPRS Berkah Dana Fadhlillah (Perseroda) Tahun 2024</a></h2>
                                <a href="informasi/rupslb16_12_2024.html">Baca Selengkapnya <i
                                        class="fa fa-long-arrow-right"
                                    ></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <center><a
                    class="btn btn-success custom-btn text-white"
                    href="informasi/all_berita.html"
                >Lihat Berita Lainnya <i class="fa fa-long-arrow-right"></i></a>
    </section>
    <!-- Start portfolio -->
    <style>
        /* Warna background hanya untuk section ini */
        .portfolio {
            background-color: #01A85A;
            padding: 40px 0;
            color: white;
            /* Warna teks agar kontras */
        }

        /* Warna tabel agar tetap kontras dengan background */
        .table {
            background-color: white !important;
            color: black;
        }

        /* Warna header tabel */
        .table thead {
            background-color: white;
            color: black;
        }

        /* Style untuk section-title */
        .section-title h2 {
            color: white;
            text-align: center;
        }
    </style>
    <section class="portfolio section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h1 style="color: white; margin-bottom: 0px;">NISBAH JUNI 2025</h1>
                        <p style="color: white; margin-top: 0px;">Berikut ini merupakan Nisbah Periode Juni 2025</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div
                    class="col-xl-9 wow fadeInLeft"
                    data-wow-delay="0.2s"
                >
                    <table class="table-success text-dark table-bordered table">
                        <thead>
                            <tr>
                                <center>
                                    <th>
                                        <center>No.
                                    </th>
                                    <th>
                                        <center>Produk
                                    </th>
                                    <th colspan="2">
                                        <center>Nisbah
                                    </th>
                                    <th>
                                        <center>Indikasi Rate (%)
                                    </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>
                                    <center>Nasabah
                                </th>
                                <th>
                                    <center>Bank
                                </th>
                                <th>
                                    <center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <center>1
                                </td>
                                <td>
                                    <center>Tabungan (Wadiah)
                                </td>
                                <td>
                                    <center>Bonus
                                </td>
                                <td>
                                    <center>-
                                </td>
                                <td>
                                    <center>-
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>2
                                </td>
                                <td>
                                    <center>Deposito 1 Bulan
                                </td>
                                <td>
                                    <center>31
                                </td>
                                <td>
                                    <center>69
                                </td>
                                <td>
                                    <center>5,24%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>3
                                </td>
                                <td>
                                    <center>Deposito 3 Bulan
                                </td>
                                <td>
                                    <center>32
                                </td>
                                <td>
                                    <center>68
                                </td>
                                <td>
                                    <center>5,40%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>4
                                </td>
                                <td>
                                    <center>Deposito 6 Bulan
                                </td>
                                <td>
                                    <center>34
                                </td>
                                <td>
                                    <center>66
                                </td>
                                <td>
                                    <center>5,74%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>5
                                </td>
                                <td>
                                    <center>Deposito 12 Bulan
                                </td>
                                <td>
                                    <center>35
                                </td>
                                <td>
                                    <center>65
                                </td>
                                <td>
                                    <center>5,91%
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="newsletter section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-12 text-center">
                    <!-- Start Newsletter Content -->
                    <div class="subscribe-text">
                        <h3 style="color: #01A85A; margin-bottom: 0px;"><b>Ingin Lihat Produk Kami?</b></h3>
                        <!--<p>Silahkan isi E-Form dengan klik tombol dibawah ini !</p>-->
                    </div>
                    <!-- Tombol di tengah -->
                    <a
                        class="btn custom-btn mt-3 text-white"
                        href="menu_produk/produk.html"
                    >Klik Disini !</a>
                </div>
            </div>
        </div>
    </section>
    <style>
        /* Styling tombol */
        .custom-btn {
            background-color: #01A85A !important;
            /* Warna hijau khusus */
            border-color: #01A85A !important;
            /* Border hijau */
            padding: 12px 24px;
            font-size: 18px;
            border-radius: 8px;
            display: inline-block;
        }

        .custom-btn:hover {
            background-color: #01A85A !important;
            /* Warna hijau lebih gelap saat hover */
            border-color: #01A85A !important;
        }

        /* Styling section */
        .newsletter {
            padding: 50px 0;
            text-align: center;
        }

        .subscribe-text h3 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .subscribe-text p {
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>
    <style>
        #jadwal-sholat-section {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        .portfolio1 {
            padding: 30px 0;
            background: url('assets/img/masjid.png') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            text-align: center;
        }

        .section-title {
            margin-bottom: 10px;
        }

        .section-title h2 {
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .jadwal-container {
            max-width: 500px;
            margin: 10px auto;
            padding: 15px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        #tanggal-waktu {
            font-size: 16px;
            font-weight: bold;
            color: #018E4D;
            margin-bottom: 10px;
        }

        .jadwal-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
        }

        .jadwal-table th,
        .jadwal-table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .jadwal-table th {
            background: #FF4500;
            color: white;
            font-weight: bold;
        }

        .jadwal-table tr:hover {
            background: rgba(1, 168, 90, 0.1);
        }

        /* Responsive */
        @media (max-width: 600px) {
            .jadwal-container {
                width: 90%;
                padding: 10px;
            }
        }
    </style>
    <div id="jadwal-sholat-section">
        <section class="portfolio1">
            <div class="jadwal-container"><br>
                <h2 style="color: #01A85A;">Jadwal Sholat</h2>
                <p id="lokasi">📍 <b>Pekanbaru, Indonesia</b></p>
                <p id="tanggal-waktu">Loading...</p>
                <table class="jadwal-table">
                    <thead>
                        <tr>
                            <th>Sholat</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody id="jadwal-sholat">
                        <tr>
                            <td colspan="2">Loading...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <script>
        function updateTanggalWaktu() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            };
            document.getElementById("tanggal-waktu").innerText = now.toLocaleDateString('id-ID', options);
        }

        function getJadwalSholat() {
            fetch(`https://api.aladhan.com/v1/timingsByCity?city=Pekanbaru&country=Indonesia&method=2`)
                .then(response => response.json())
                .then(data => {
                    if (data.code === 200) {
                        let jadwal = data.data.timings;
                        let tbody = document.getElementById("jadwal-sholat");
                        let sholatList = {
                            "Fajr": "Subuh",
                            "Dhuhr": "Dzuhur",
                            "Asr": "Ashar",
                            "Maghrib": "Maghrib",
                            "Isha": "Isya"
                        };
                        tbody.innerHTML = "";
                        for (let key in sholatList) {
                            tbody.innerHTML += `
                        <tr>
                            <td>${sholatList[key]}</td>
                            <td>${jadwal[key]}</td>
                        </tr>
                    `;
                        }
                    }
                })
                .catch(error => {
                    console.error("Gagal mengambil data:", error);
                    document.getElementById("jadwal-sholat").innerHTML =
                        "<tr><td colspan='2'>Gagal memuat data</td></tr>";
                });
        }
        getJadwalSholat();
        updateTanggalWaktu();
        setInterval(updateTanggalWaktu, 1000);
        setInterval(getJadwalSholat, 3600000); // setiap jam
    </script>
@endsection
