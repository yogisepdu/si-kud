@extends('layouts.app')

@section('title', $berita['judul'])

@section('content')

    <section class="news-single section">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-12">

                    <div class="single-main">


                        <h1 class="news-title">
                            {{ $berita['judul'] }}
                        </h1>

                        <div class="meta">
                            <span class="date">
                                <i class="fa fa-clock-o"></i>
                                {{ $berita['tanggal'] }}
                            </span>
                        </div>

                        <div class="news-head">
                            <img
                                src="{{ asset('assets/img/foto_berita/' . $berita['gambar']) }}"
                                class="img-fluid"
                            >
                        </div>

                        <div class="news-text text-justify">
                            {!! $berita['isi'] !!}
                        </div>

                        <div class="blog-bottom">
                            <!-- Social Share -->
                            <ul class="social-share">
                                <li class="facebook"><a href="#"><i
                                            class="fa fa-facebook"></i><span>Facebook</span></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                                </li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                            <!-- Next Prev -->

                            <!--/ End Next Prev -->
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection
