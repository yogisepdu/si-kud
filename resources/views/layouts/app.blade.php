<!DOCTYPE html>
<html
    class="no-js"
    lang="id"
>

<meta
    content="text/html;charset=UTF-8"
    http-equiv="content-type"
/>

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta
        content="IE=edge"
        http-equiv="X-UA-Compatible"
    >
    <!-- Favicon -->
    <link
        href="{{ asset('assets/apple-touch-icon.png') }}"
        rel="apple-touch-icon"
        sizes="180x180"
    >
    <link
        href="{{ asset('assets/favicon-32x32.png') }}"
        rel="icon"
        sizes="32x32"
        type="image/png"
    >
    <link
        href="{{ asset('assets/favicon-16x16.png') }}"
        rel="icon"
        sizes="16x16"
        type="image/png"
    >
    <link
        href="{{ asset('assets/site.webmanifest') }}"
        rel="manifest"
    >

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
        rel="stylesheet"
    >
    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link
        href="{{ asset('assets/css/bootstrap.min.css') }}"
        rel="stylesheet"
    >

    <!-- Nice Select CSS -->
    <link
        href="{{ asset('assets/css/nice-select.css') }}"
        rel="stylesheet"
    >

    <!-- Font Awesome CSS -->
    <link
        href="{{ asset('assets/css/font-awesome.min.css') }}"
        rel="stylesheet"
    >

    <!-- IcoFont CSS -->
    <link
        href="{{ asset('assets/css/icofont.css') }}"
        rel="stylesheet"
    >

    <!-- Slicknav CSS -->
    <link
        href="{{ asset('assets/css/slicknav.min.css') }}"
        rel="stylesheet"
    >

    <!-- Owl Carousel CSS -->
    <link
        href="{{ asset('assets/css/owl-carousel.css') }}"
        rel="stylesheet"
    >

    <!-- Datepicker CSS -->
    <link
        href="{{ asset('assets/css/datepicker.css') }}"
        rel="stylesheet"
    >

    <!-- Animate CSS -->
    <link
        href="{{ asset('assets/css/animate.min.css') }}"
        rel="stylesheet"
    >

    <!-- Magnific Popup CSS -->
    <link
        href="{{ asset('assets/css/magnific-popup.css') }}"
        rel="stylesheet"
    >

    <!-- Normalize CSS -->
    <link
        href="{{ asset('assets/css/normalize.css') }}"
        rel="stylesheet"
    >

    <!-- Main Style -->
    <link
        href="{{ asset('assets/style.css') }}"
        rel="stylesheet"
    >

    <!-- Responsive CSS -->
    <link
        href="{{ asset('assets/css/responsive.css') }}"
        rel="stylesheet"
    >
    <link
        href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css"
        rel="stylesheet"
    />

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <meta
        content="{{ csrf_token() }}"
        name="csrf-token"
    >
</head>

<body>
    <!-- Elfsight All-in-One Chat | Untitled All-in-One Chat -->
    <script
        src="https://elfsightcdn.com/platform.js"
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

    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    <script>
        const lightbox = GLightbox({
            touchNavigation: true,
            loop: true,
            zoomable: true,
            autoplayVideos: true
        });
    </script>

    <script>
        const lightbox = GLightbox({
            touchNavigation: true,
            loop: true,
            zoomable: true,
            autoplayVideos: true
        });
    </script>

    <!-- Elfsight WhatsApp -->
    <div
        class="elfsight-app-7eb2eb61-76df-4aac-85c0-d03dd055fee0"
        data-elfsight-app-lazy
    >
    </div>

</body>

</html>
