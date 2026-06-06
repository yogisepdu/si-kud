@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    <!-- End Header Area -->
    <style>
        .product-section {
            padding: 40px 0;
            background-color: #01A85A;
        }

        .product-card {
            background: #fff;
            border-radius: 16px;
            padding: 30px 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-icon {
            font-size: 48px;
            color: #28a745;
            margin-bottom: 15px;
        }

        .product-title {
            font-size: 20px;
            font-weight: 600;
            color: #343a40;
            margin-bottom: 20px;
        }

        .btn-product {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-product {
            background-color: #28a745;
            /* Hijau */
            color: white;
            /* Warna teks putih */
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            display: inline-block;
            font-weight: 600;
        }

        .btn-product:hover {
            background-color: #218838;
            /* Warna saat hover */
            color: white;
            /* Tetap putih saat hover */
        }


        .mb-4 {
            margin-bottom: 30px;
        }
    </style>

    <!-- ===== Penghimpunan Dana ===== -->
    <section class="product-section">
        <div class="container">
            <div class="section-title">
                <h2 style="color: white; margin-bottom: 0px;"><b>
                        <center>Produk dan Layanan KUD</center>
                    </b></h2>
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
