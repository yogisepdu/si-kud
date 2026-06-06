<section class="portfolio section" id="galeri">
    <div class="container">

        <!-- Judul -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h1 style="color: white; margin-bottom: 10px;">
                        GALERI KUD KAMPAR
                    </h1>
                    <p style="color: white;">
                        Dokumentasi kegiatan dan aktivitas KUD Kampar
                    </p>
                </div>
            </div>
        </div>

        <!-- Galeri -->
        <div class="row g-4">

            @foreach ($galleries as $gallery)
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">

                        <a class="glightbox" data-gallery="kud"
                            data-title="{{ $gallery->title ?? 'Galeri KUD Kampar' }}"
                            href="{{ asset('storage/' . $gallery->image) }}">

                            <img alt="{{ $gallery->title ?? 'Galeri KUD Kampar' }}" class="img-fluid"
                                src="{{ asset('storage/' . $gallery->image) }}">

                        </a>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>

<style>
    .gallery-item {
        overflow: hidden;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        transition: 0.3s ease;
        margin-bottom: 20px;
    }

    .gallery-item img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        transition: 0.4s ease;
    }

    .gallery-item:hover {
        transform: translateY(-5px);
    }

    .gallery-item:hover img {
        transform: scale(1.08);
    }

    /* =========================
   LIGHTBOX CUSTOM
========================= */

    .gallery-item {
        overflow: hidden;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, .15);
        transition: .3s;
    }

    .gallery-item:hover {
        transform: translateY(-5px);
    }

    .gallery-item img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        transition: .4s;
    }

    .gallery-item:hover img {
        transform: scale(1.08);
    }

    /* GLightbox */
    .gclose {
        top: 15px !important;
        right: 15px !important;
    }

    .gslide-description {
        background: rgba(0, 0, 0, .75) !important;
    }

    .gslide-title {
        color: #fff !important;
        font-size: 18px !important;
        font-weight: 600 !important;
    }
</style>
