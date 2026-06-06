@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    <!-- End Header Area -->
    <section class="why-choose section" style="padding: 30px 0 10px 0;">
        <div class="container" style="margin-top: -0px;">
            <div class="row">
                <div class="col-lg-12 col-12">

                    <!-- Start Choose Left -->
                    <div class="choose-left text-justify">
                        <h3>STRUKTUR ORGANISASI</h3>
                        <center></center>
                        @if ($profile?->structure_image)
                            <div class="mt-4 text-center">
                                <img alt="Struktur Organisasi" class="img-fluid rounded shadow-sm"
                                    src="{{ asset('storage/' . $profile->structure_image) }}">
                            </div>
                        @else
                            <div class="alert alert-info mt-3">
                                Struktur organisasi belum tersedia.
                            </div>
                        @endif
                        <br>

                    </div>
                    <!-- End Choose Left -->
                </div>

            </div>
        </div>
    </section>
@endsection
