@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    <!-- End Header Area -->
    <style>
        .product-section {
            padding: 70px 0;
            background: #F8F9FA;
        }

        .section-title h2 {
            color: #2E7D32;
            font-weight: 700;
            margin-bottom: 50px;
        }

        .product-card {
            background: #FFFFFF;
            border-radius: 16px;
            padding: 35px 25px;
            border: 1px solid #E9ECEF;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            text-align: center;
            transition: all .3s ease;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 35px rgba(0, 0, 0, 0.10);
        }

        .product-icon {
            font-size: 52px;
            color: #28A745;
            margin-bottom: 20px;
        }

        .product-title {
            font-size: 22px;
            font-weight: 600;
            color: #343A40;
            margin-bottom: 25px;
        }

        .btn-product {
            display: inline-block;
            background: #28A745;
            color: #FFF;
            padding: 10px 26px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: .3s;
        }

        .btn-product:hover {
            background: #1E7E34;
            color: #FFF;
            text-decoration: none;
        }

        .mb-4 {
            margin-bottom: 30px;
        }
    </style>

    <!-- ===== Penghimpunan Dana ===== -->
    <section class="product-section">
        <div class="container">
            <div class="section-title mb-5 text-center">
                <h2><b>Produk dan Layanan KUD</b></h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="product-card">
                        <i class="icofont-listine-dots product-icon"></i>
                        <div class="product-title">Layanan Pupuk</div>
                        <a class="btn-product" href="{{ route('layanan.show', 'pupuk') }}">
                            <h6 style="color: white;">Lihat</h6>
                        </a>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="product-card">
                        <i class="icofont-listine-dots product-icon"></i>
                        <div class="product-title">Layanan TBS</div>
                        <a class="btn-product" href="{{ route('layanan.show', 'tbs') }}">
                            <h6 style="color: white;">Lihat</h6>
                        </a>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="product-card">
                        <i class="icofont-listine-dots product-icon"></i>
                        <div class="product-title">Layanan Simpan Pinjam</div>
                        <a class="btn-product" href="{{ route('layanan.show', 'simpan_pinjam') }}">
                            <h6 style="color: white;">Lihat</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
