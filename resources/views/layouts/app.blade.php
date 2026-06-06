<!DOCTYPE html>
<html class="no-js" lang="id">

<meta content="text/html;charset=UTF-8" http-equiv="content-type" />

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <!-- Favicon -->
    <link href="{{ asset('assets/apple-touch-icon.png') }}" rel="apple-touch-icon" sizes="180x180">
    <link href="{{ asset('assets/favicon-32x32.png') }}" rel="icon" sizes="32x32" type="image/png">
    <link href="{{ asset('assets/favicon-16x16.png') }}" rel="icon" sizes="16x16" type="image/png">
    <link href="{{ asset('assets/site.webmanifest') }}" rel="manifest">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Nice Select CSS -->
    <link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- IcoFont CSS -->
    <link href="{{ asset('assets/css/icofont.css') }}" rel="stylesheet">

    <!-- Slicknav CSS -->
    <link href="{{ asset('assets/css/slicknav.min.css') }}" rel="stylesheet">

    <!-- Owl Carousel CSS -->
    <link href="{{ asset('assets/css/owl-carousel.css') }}" rel="stylesheet">

    <!-- Datepicker CSS -->
    <link href="{{ asset('assets/css/datepicker.css') }}" rel="stylesheet">

    <!-- Animate CSS -->
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">

    <!-- Magnific Popup CSS -->
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">

    <!-- Normalize CSS -->
    <link href="{{ asset('assets/css/normalize.css') }}" rel="stylesheet">

    <!-- Main Style -->
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    <link href="../cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        @media (max-width: 768px) {
            .logo-left {
                display: block;
                /* Pastikan logo kiri tetap muncul */
            }

            .logo-right {
                display: none;
                /* Sembunyikan logo kanan */
            }
        }

        @media (max-width: 768px) {
            .header {
                background: none !important;
                /* Menghapus warna latar belakang header */
                border-bottom: none !important;
                /* Menghapus garis bawah jika ada */
            }
        }

        .header {
            background-color: transparent;
            padding: 10px 20px;
            border-bottom: 2px solid #ddd;
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo-left,
        .logo-right {
            flex: 0 0 auto;
        }

        .main-menu {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .nav.menu {
            display: flex;
            gap: 20px;
            align-items: center;
            list-style: none;
            position: relative;
        }

        .nav.menu li {
            position: relative;
        }

        .nav.menu li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            padding: 10px;
            transition: 0.3s;
            display: block;
        }

        .nav.menu li a:hover {
            color: #10B44D;
        }

        /* Styling Dropdown */
        .dropdown {
            display: none;
            position: absolute;
            left: 0;
            top: 100%;
            background-color: white;
            border: 1px solid #ddd;
            list-style: none;
            padding: 10px 0;
            min-width: 200px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .dropdown li {
            width: 100%;
        }

        .dropdown li a {
            padding: 10px;
            display: block;
            color: #333;
            transition: background 0.3s;
        }

        .dropdown li a:hover {
            background: #10B44D;
            color: white;
        }

        @media (max-width: 768px) {
            .logo-left {
                display: block;
                position: fixed;
                /* Tetap di atas layar */
                top: 10px;
                /* Jarak dari atas */
                left: 20px;
                /* Jarak dari kiri */
                z-index: 1001;
                /* Harus lebih tinggi dari menu */
                background-color: rgba(255, 255, 255, 0.8);
                /* Opsional: Biar lebih terlihat */
                padding: 5px;
                /* Opsional: Tambahkan ruang */
                border-radius: 5px;
                /* Opsional: Biarkan sudutnya lembut */
            }

            .mobile-nav {
                position: relative;
                z-index: 1000;
                /* Pastikan menu ada di bawah logo */
            }

            .nav.menu {
                position: fixed;
                /* Tetap di layar */
                top: 50px;
                /* Sesuaikan agar tidak menutupi logo */
                width: 100%;
                background-color: white;
                /* Warna latar menu */
                z-index: 999;
                /* Pastikan tetap di bawah logo */
            }
        }

        /* Menampilkan dropdown saat hover */
        .nav.menu li:hover .dropdown {
            display: block;
        }

        /* Marquee */
        .marquee-container {
            width: 100%;
            /* Atur lebar manual */
            height: 30px;
            /* Atur tinggi manual */
            margin: 0 auto;
            /* Pusatkan marquee */
            background-color: #FF4500 !important;
            /* Pastikan warna background terlihat */
            color: white;
            padding: 10px;
            /* Tambahkan padding agar background lebih terlihat */
            overflow: hidden;
            white-space: nowrap;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            /* Opsional: sudut melengkung */
            display: flex;
            align-items: center;
            /* Pusatkan teks secara vertikal */
            position: relative;
            /* Pastikan background tidak tertutup elemen lain */
        }

        /* Marquee Text */
        .marquee-text {
            display: inline-block;
            white-space: nowrap;
            animation: marquee 20s linear infinite;
            position: relative;
            /* Pastikan teks tidak mengganggu background */
            z-index: 1;
            /* Letakkan teks di atas background */
        }

        /* Animasi Marquee */
        @keyframes marquee {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(-100%);
            }
        }

        /* Animasi Marquee */
        @keyframes marquee {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(-100%);
            }
        }

        /* Animasi Marquee */
        @keyframes marquee {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(-100%);
            }
        }

        /* Untuk Mobile */
        @media (max-width: 768px) {
            .nav.menu {
                flex-direction: column;
                gap: 0;
            }

            .nav.menu li {
                width: 100%;
                text-align: left;
            }

            .dropdown {
                position: static;
                box-shadow: none;
                border: none;
                display: none;
                width: 100%;
            }

            .dropdown li {
                width: 100%;
            }

            .dropdown li a {
                padding: 10px 20px;
            }
        }

        .nav.menu li ul.dropdown {
            position: absolute;
            left: 0;
            top: 100%;
            background: white;
            list-style: none;
            padding: 10px 0;
            margin: 0;
            display: none;
            /* Default disembunyikan */
            min-width: 200px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .nav.menu li ul.dropdown li {
            display: block;
        }

        .nav.menu li ul.dropdown li a {
            padding: 10px 15px;
            display: block;
            color: #333;
            text-decoration: none;
            transition: 0.3s;
        }

        .nav.menu li ul.dropdown li a:hover {
            background-color: #f8f9fa;
            color: #10B44D;
        }

        /* Menampilkan dropdown saat hover */
        .nav.menu li:hover>ul.dropdown {
            display: block;
        }

        /* Perbaikan tombol Lightbox */
        .lb-data .lb-close {
            opacity: 1 !important;
            display: block !important;
        }

        .lb-nav a.lb-prev,
        .lb-nav a.lb-next {
            opacity: 1 !important;
        }

        .lb-closeContainer {
            display: block !important;
        }

        .lb-dataContainer {
            display: block !important;
        }

        /* profile */
        .profile-box {
            background: #01A85A;
            color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .1);
        }

        .profile-box p,
        .profile-box li {
            color: #fff;
            font-size: 15px;
            line-height: 1.9;
        }

        .profile-box ul,
        .profile-box ol {
            padding-left: 25px;
        }

        .profile-heading {
            color: #fff;
            font-weight: 700;
            margin-top: 25px;
            margin-bottom: 15px;
        }

        .profile-box hr {
            border-color: rgba(255, 255, 255, .2);
        }

        .content-block {
            text-align: justify;
        }

        .content-block p:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<!-- Elfsight All-in-One Chat | Untitled All-in-One Chat -->
<script src="https://static.elfsight.com/platform/platform.js" async></script>

@include('layouts.header')

@yield('content')

@include('layouts.footer')

<!-- jQuery -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<!-- jQuery Migrate -->
<script src="{{ asset('assets/js/jquery-migrate-3.0.0.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>

<!-- Easing -->
<script src="{{ asset('assets/js/easing.js') }}"></script>

<!-- Colors -->
<script src="{{ asset('assets/js/colors.js') }}"></script>

<!-- Popper -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>

<!-- Bootstrap Datepicker -->
<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>

<!-- jQuery Nav -->
<script src="{{ asset('assets/js/jquery.nav.js') }}"></script>

<!-- Slicknav -->
<script src="{{ asset('assets/js/slicknav.min.js') }}"></script>

<!-- ScrollUp -->
<script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>

<!-- Nice Select -->
<script src="{{ asset('assets/js/niceselect.js') }}"></script>

<!-- Tilt -->
<script src="{{ asset('assets/js/tilt.jquery.min.js') }}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('assets/js/owl-carousel.js') }}"></script>

<!-- Counter Up -->
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>

<!-- Stellar -->
<script src="{{ asset('assets/js/steller.js') }}"></script>

<!-- WOW -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>

<!-- Magnific Popup -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

<!-- Waypoints CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

<!-- Bootstrap -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    function toggleMenu() {
        document.querySelector(".nav.menu").classList.toggle("active");
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>
    const lightbox = GLightbox({
        touchNavigation: true,
        loop: true,
        zoomable: true,
        autoplayVideos: true
    });
</script>

</body>

</html>
