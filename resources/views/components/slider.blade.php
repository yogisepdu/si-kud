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
                src="{{ asset('assets/img/slide_tabungan.png') }}"
                alt="Slider 1"
            >
        </div>
        <div class="single-slider">
            <img
                src="{{ asset('assets/img/slide_pembiayaan.png') }}"
                alt="Slider 2"
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
