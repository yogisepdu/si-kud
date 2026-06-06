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
        @php
            use Illuminate\Support\Facades\Storage;
        @endphp

        {{-- @foreach ($sliders as $slider)
            <div class="single-slider">
                <img alt="{{ $slider->title }}" src="{{ asset('storage/' . $slider->image) }}">
            </div>
        @endforeach --}}
        @foreach ($sliders as $slider)
            <div class="single-slider">

                <img alt="{{ $slider->title }}" src="{{ Storage::url($slider->image) }}">
            </div>
        @endforeach
    </div>
</section>
<div class="marquee-container">
    <div class="marquee-text">
        Selamat datang di Website Resmi Bank Syariah Berkah, Hijrah Menjadi Mudah bersama Bank Syariah Berkah. Masya
        Allah... #nyamandalamkeberkahan
    </div>
</div>
<br>
