@extends('layouts.app')

@section('title', $berita->judul)

@section('content')

    <section class="news-single section">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-12">

                    <div class="single-main">

                        <h1 class="news-title">
                            {{ $berita->judul }}
                        </h1>

                        <div class="meta mb-3">
                            <span class="date">
                                <i class="fa fa-calendar"></i>
                                {{ $berita->tanggal->translatedFormat('d F Y') }}
                            </span>
                        </div>

                        @if ($berita->gambar)
                            <div class="news-head mb-4">
                                <img
                                    alt="{{ $berita->judul }}"
                                    class="img-fluid rounded"
                                    src="{{ asset('storage/' . $berita->gambar) }}"
                                >
                            </div>
                        @endif

                        <div class="news-text text-justify">
                            {!! $berita->isi !!}
                        </div>

                        <div class="blog-bottom mt-5">

                            <ul class="social-share">

                                <li class="facebook">
                                    <a
                                        href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                        target="_blank"
                                    >
                                        <i class="fa fa-facebook"></i>
                                        <span>Facebook</span>
                                    </a>
                                </li>

                                <li class="twitter">
                                    <a
                                        href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($berita->judul) }}"
                                        target="_blank"
                                    >
                                        <i class="fa fa-twitter"></i>
                                        <span>Twitter</span>
                                    </a>
                                </li>

                                <li class="linkedin">
                                    <a
                                        href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}"
                                        target="_blank"
                                    >
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-12">

                    <div class="main-sidebar">

                        <div class="single-widget category">

                            <h3 class="title">
                                Berita Lainnya
                            </h3>

                            @foreach ($beritaLainnya as $item)
                                <a
                                    href="{{ route('berita.detail', $item->slug) }}"
                                    class="text-decoration-none"
                                >
                                    <div class="single-post mb-3">

                                        <div class="image">
                                            <img
                                                alt="{{ $item->judul }}"
                                                src="{{ asset('storage/' . $item->gambar) }}"
                                            >
                                        </div>

                                        <div class="content">

                                            <h5>
                                                {{ $item->judul }}
                                            </h5>

                                            <span>
                                                {{ $item->tanggal->translatedFormat('d F Y') }}
                                            </span>

                                        </div>

                                    </div>
                                </a>
                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection
