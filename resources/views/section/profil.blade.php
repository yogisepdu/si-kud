@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    <section class="why-choose section py-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">

                    <div class="section-title mb-4">
                        <h2>{{ $profile->title }}</h2>
                    </div>

                    <div class="profile-content">

                        <div class="profile-box">

                            <div class="content-block">
                                {!! $profile->history !!}
                            </div>

                            <hr>

                            <h4 class="profile-heading">
                                Visi
                            </h4>

                            <div class="content-block">
                                {!! $profile->vision !!}
                            </div>

                            <hr>

                            <h4 class="profile-heading">
                                Misi
                            </h4>

                            <div class="content-block">
                                {!! $profile->mission !!}
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
