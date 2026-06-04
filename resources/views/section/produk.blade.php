@extends('layouts.app')

@section('title', $judul)

@section('content')
    <section
        class="why-choose section"
        style="padding: 30px 0 10px 0;"
    >
        <div
            class="container"
            style="margin-top: 0;"
        >
            <div class="row">
                <div class="col-lg-12 col-12">

                    <div class="choose-left text-justify">
                        <h3>{{ $judul }}</h3>

                        {!! $isi !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
