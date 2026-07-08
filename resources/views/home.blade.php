@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    @include('components.slider')

    @include('components.pengumuman')

    @include('components.berita')

    @include('components.galeri')

    @include('components.produk')

    @include('components.kritik-saran')

@endsection
