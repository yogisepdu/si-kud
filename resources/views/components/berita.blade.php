<section class="blog section" id="berita" style="padding:30px 0;">
    <div class="container">

        ```
        <div class="section-title text-center">
            <h2 style="color:#01A85A;">
                BERITA & INFORMASI
            </h2>
        </div>

        <div class="row">


            @forelse ($berita ?? [] as $item)
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-news">

                        <div class="news-head">
                            <img src="{{ asset('storage/' . data_get($item, 'gambar')) }}">
                        </div>

                        <div class="news-body">
                            <div class="news-content">

                                <div class="date">
                                    {{ $item['tanggal'] }}
                                </div>

                                <h2>
                                    <a href="{{ route('berita.detail', data_get($item, 'slug')) }}">
                                        {{ data_get($item, 'judul') }}
                                    </a>
                                </h2>

                                <p>
                                    {{ data_get($item, 'ringkasan') }}
                                </p>

                                <div class="mt-3">
                                    <a class="btn-berita" href="{{ route('berita.detail', data_get($item, 'slug')) }}">
                                        Baca Selengkapnya
                                        <i class="fa fa-arrow-right ms-2"></i>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">
                    <p>Belum ada berita yang tersedia.</p>
                </div>
            @endforelse

        </div>

    </div>
    ```
    <center>
        <div class="mt-5 text-center">
            <a class="btn-semua-berita" href="{{ route('berita.all') }}">
                <i class="fa fa-newspaper-o me-2"></i>
                Lihat Semua Berita
                <i class="fa fa-arrow-right ms-2"></i>
            </a>
        </div>
    </center>

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
