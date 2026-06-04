<section
    class="blog section"
    style="padding:30px 0;"
    id="berita"
>
    <div class="container">

        ```
        <div class="section-title text-center">
            <h2 style="color:#01A85A;">
                BERITA & INFORMASI
            </h2>
        </div>

        <div class="row">

            @foreach ($berita as $item)
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-news">

                        <div class="news-head">
                            <img src="{{ asset('assets/img/foto_berita/' . $item['gambar']) }}">
                        </div>

                        <div class="news-body">
                            <div class="news-content">

                                <div class="date">
                                    {{ $item['tanggal'] }}
                                </div>

                                <h2>
                                    <a href="{{ route('berita.detail', $item['slug']) }}">
                                        {{ $item['judul'] }}
                                    </a>
                                </h2>

                                <p>
                                    {{ $item['ringkasan'] }}
                                </p>

                                <a href="{{ route('berita.detail', $item['slug']) }}">
                                    Baca Selengkapnya
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>

                            </div>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
    ```
    <center><a
            class="btn btn-success custom-btn text-white"
            href="{{ route('berita.all') }}"
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
