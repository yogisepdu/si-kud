@extends('layouts.app')

@section('title', $judul)

@section('content')

    <style>
        .content-wrapper {
            line-height: 1.9;
            font-size: 16px;
            color: #444;
        }

        .content-wrapper h1,
        .content-wrapper h2,
        .content-wrapper h3,
        .content-wrapper h4,
        .content-wrapper h5,
        .content-wrapper h6 {
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
            color: #1f2937;
        }

        .content-wrapper p {
            margin-bottom: 1rem;
        }

        .content-wrapper img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 15px 0;
        }

        .content-wrapper table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .05);
        }

        .content-wrapper table th,
        .content-wrapper table td {
            border: 1px solid #dee2e6;
            padding: 12px 16px;
            vertical-align: middle;
        }

        .content-wrapper table th {
            background: #198754;
            color: #fff;
            text-align: center;
            font-weight: 600;
        }

        .content-wrapper table th {
            background: #198754;
            color: #fff !important;
            text-align: center;
            font-weight: 600;
        }

        .content-wrapper table th p {
            color: #fff !important;
            margin: 0;
            font-weight: 600;
        }

        .content-wrapper table td p {
            margin: 0;
        }

        .content-wrapper table tbody tr:nth-child(even) {
            background: #f8f9fa;
        }

        .content-wrapper table tbody tr:hover {
            background: #eef8f1;
            transition: .2s;
        }

        .content-wrapper ul,
        .content-wrapper ol {
            padding-left: 22px;
        }

        .content-wrapper blockquote {
            border-left: 5px solid #198754;
            padding-left: 15px;
            color: #666;
            margin: 20px 0;
        }

        /* Responsive Table */
        .table-responsive-custom {
            overflow-x: auto;
        }
    </style>

    <section class="why-choose section py-5">
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10">

                    <div class="card rounded-4 border-0 shadow-sm">

                        <div class="card-body p-lg-5 p-4">

                            <h2 class="fw-bold mb-4">
                                {{ $judul }}
                            </h2>

                            <div class="content-wrapper">

                                <div class="table-responsive-custom">
                                    {!! $isi !!}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection
