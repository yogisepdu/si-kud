@extends('layouts.app')

@section('title', 'Berita')

@section('content')

    <section
        class="blog section"
        style="padding:30px 0;"
    >
        <div class="container">

            ```
            <div class="section-title text-center">
                <h2 style="color:#01A85A;">
                    BERITA & INFORMASI
                </h2>
            </div>

            <div class="row">

                @forelse ($berita ?? [] as $item)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">

                        <div class="single-news h-100">

                            <div class="news-head">
                                <img
                                    src="{{ asset('storage/' . data_get($item, 'gambar')) }}"
                                    alt="{{ data_get($item, 'judul') }}"
                                >
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
                                        <a
                                            class="btn-berita"
                                            href="{{ route('berita.detail', data_get($item, 'slug')) }}"
                                        >
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

    </section>

@endsection
