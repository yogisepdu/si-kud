<section class="blog section" id="blog">
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
            @foreach ($pengumuman as $item)
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-news">

                        <div class="news-head">
                            <img alt="{{ $item->title }}" src="{{ asset('storage/' . $item->image) }}">
                        </div>

                        <div class="news-body">
                            <div class="news-content">

                                <h2>
                                    <a>{{ $item->title }}</a>
                                </h2>

                                <p class="text">
                                    {{ $item->description }}
                                </p>

                            </div>
                        </div>

                    </div>

                </div>
            @endforeach
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
