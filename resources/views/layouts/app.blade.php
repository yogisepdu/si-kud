<!DOCTYPE html>
<html
    class="no-js"
    lang="id"
>

<meta
    http-equiv="content-type"
    content="text/html;charset=UTF-8"
/>

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge"
    >
    <meta
        name="twitter:image"
        content="assets/img/logo.png"
    >

    <!-- Favicon -->
    <link
        rel="icon"
        href="assets/img/icon.png"
    >
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
        rel="stylesheet"
    >
    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/bootstrap.min.css') }}"
    >

    <!-- Nice Select CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/nice-select.css') }}"
    >

    <!-- Font Awesome CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/font-awesome.min.css') }}"
    >

    <!-- IcoFont CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/icofont.css') }}"
    >

    <!-- Slicknav CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/slicknav.min.css') }}"
    >

    <!-- Owl Carousel CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/owl-carousel.css') }}"
    >

    <!-- Datepicker CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/datepicker.css') }}"
    >

    <!-- Animate CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/animate.min.css') }}"
    >

    <!-- Magnific Popup CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/magnific-popup.css') }}"
    >

    <!-- Normalize CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/normalize.css') }}"
    >

    <!-- Main Style -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/style.css') }}"
    >

    <!-- Responsive CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/responsive.css') }}"
    >
    <link
        rel="stylesheet"
        href="../cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"
    >
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

        /* Styling dropdown */
        .nav.menu li {
            position: relative;
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
    </style>
</head>
<!-- Elfsight All-in-One Chat | Untitled All-in-One Chat -->
<script
    src="https://static.elfsight.com/platform/platform.js"
    async
></script>

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
</body>

</html>
