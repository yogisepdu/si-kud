<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <style>
        @page {
            size: A4 portrait;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #000;
        }

        .slip {
            height: 143mm;
            border: 1px solid #000;
            position: relative;
            overflow: hidden;
        }

        .header {
            border-bottom: 1px solid #000;
            padding: 10px 15px;
        }

        .header table {
            width: 100%;
            border-collapse: collapse;
        }

        .logo {
            width: 60px;
            height: 60px;
        }

        .koperasi {
            vertical-align: middle;
            padding-left: 10px;
        }

        .koperasi-1 {
            font-size: 22px;
            font-weight: bold;
            color: #777;
            line-height: 1;
        }

        .koperasi-2 {
            font-size: 17px;
            font-weight: bold;
            margin-top: 3px;
        }

        .alamat {
            text-align: right;
            font-size: 10px;
            font-weight: bold;
            line-height: 1.3;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            text-decoration: underline;
            margin: 10px 0 15px;
            font-family: DejaVu Serif;
        }

        .content {
            padding: 0 35px 15px;
            position: relative;
        }

        .watermark {
            position: absolute;
            width: 220px;
            left: 50%;
            top: 20px;
            margin-left: -110px;
            opacity: 0.05;
        }

        .info {
            width: 100%;
            border-collapse: collapse;
            position: relative;
            z-index: 2;
        }

        .info td {
            padding: 3px 0;
            vertical-align: top;
        }

        .label {
            width: 150px;
        }

        .separator {
            width: 10px;
        }

        .value {
            font-weight: bold;
            font-family: DejaVu Serif;
        }

        .nominal {
            margin-top: 20px;
            font-size: 15px;
            font-weight: bold;
            font-style: italic;
            font-family: DejaVu Serif;
        }

        .footer {
            margin-top: 18px;
            border-top: 1px dashed #000;
            padding-top: 20px;
            position: relative;
        }

        .footer table {
            width: 100%;
        }

        .footer td {
            text-align: center;
            width: 50%;
        }

        .ttd-space {
            height: 75px;
        }

        .nama {
            font-weight: bold;
            font-size: 12px;
            font-family: DejaVu Serif;
        }

        .garis {
            font-weight: bold;
        }

        .stempel {
            position: absolute;
            right: 100px;
            top: 30px;
            width: 110px;
            opacity: .25;
        }

        .cut-line {
            border-top: 1px dashed #000;
            height: 1px;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

    {{-- ===================== SLIP 1 ===================== --}}

    <div class="slip">

        <div class="header">

            <table>
                <tr>

                    <td width="10%">
                        <img class="logo" src="{{ public_path('assets/img/logo.jpeg') }}">
                    </td>

                    <td class="koperasi" width="60%">

                        <div class="koperasi-1">
                            Koperasi Simpan Pinjam
                        </div>

                        <div class="koperasi-2">
                            SI-KUD Kampar
                        </div>

                    </td>

                    <td class="alamat" width="30%">
                        Kantor : <br>
                        Jl. Prof. M. Yamin No. 01<br>
                        Bangkinang Kota<br>
                        Kabupaten Kampar<br>
                        Provinsi Riau
                    </td>

                </tr>
            </table>

        </div>

        <div class="title">
            BUKTI PEMBAYARAN ANGSURAN
        </div>

        <div class="content">

            <img class="watermark" src="{{ public_path('assets/img/logo.jpeg') }}">

            <table class="info">

                <tr>
                    <td class="label">Kode Pinjaman</td>
                    <td class="separator">:</td>
                    <td class="value">
                        {{ $angsuran->pinjaman->kode_pinjaman }}
                    </td>

                    <td class="label">Tanggal Bayar</td>
                    <td class="separator">:</td>
                    <td class="value">
                        {{ $angsuran->tanggal_bayar?->format('d/m/Y') }}
                    </td>
                </tr>

                <tr>
                    <td>Nama Peminjam</td>
                    <td>:</td>
                    <td class="value">
                        {{ strtoupper($angsuran->pinjaman->anggota->user->name) }}
                    </td>

                    <td>Angsuran Ke</td>
                    <td>:</td>
                    <td class="value">
                        {{ $angsuran->angsuran_ke }}
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td class="value">
                        {{ strtoupper($angsuran->status) }}
                    </td>

                    <td>Jatuh Tempo</td>
                    <td>:</td>
                    <td class="value">
                        {{ $angsuran->jatuh_tempo?->format('d/m/Y') }}
                    </td>
                </tr>

            </table>

            <div class="nominal">
                Rp {{ number_format($angsuran->nominal, 0, ',', '.') }},-
            </div>

            <div
                style="
                    margin-top:8px;
                    font-style:italic;
                    font-size:12px;
                ">
                ({{ trim(terbilang($angsuran->nominal)) }} Rupiah)
            </div>

            <div class="footer">

                <table>

                    <tr>
                        <td>Petugas Koperasi,</td>
                        <td>Penyetor,</td>
                    </tr>

                    <tr>
                        <td class="ttd-space"></td>
                        <td class="ttd-space"></td>
                    </tr>

                    <tr>

                        <td>
                            <span class="garis">
                                (........................................)
                            </span>
                        </td>

                        <td>

                            <div class="nama">
                                {{ strtoupper($angsuran->pinjaman->anggota->user->name) }}
                            </div>

                            <span class="garis">
                                (........................................)
                            </span>

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

    <div class="cut-line"></div>

    {{-- ===================== SLIP 2 ===================== --}}

    <div class="slip">

        <div class="header">

            <table>
                <tr>

                    <td width="10%">
                        <img class="logo" src="{{ public_path('assets/img/logo.jpeg') }}">
                    </td>

                    <td class="koperasi" width="60%">

                        <div class="koperasi-1">
                            Koperasi Simpan Pinjam
                        </div>

                        <div class="koperasi-2">
                            SI-KUD Kampar
                        </div>

                    </td>

                    <td class="alamat" width="30%">
                        Kantor : <br>
                        Jl. Prof. M. Yamin No. 01<br>
                        Bangkinang Kota<br>
                        Kabupaten Kampar<br>
                        Provinsi Riau
                    </td>

                </tr>
            </table>

        </div>

        <div class="title">
            BUKTI PEMBAYARAN ANGSURAN
        </div>

        <div class="content">

            <img class="watermark" src="{{ public_path('assets/img/logo.jpeg') }}">

            <table class="info">

                <tr>
                    <td class="label">Kode Pinjaman</td>
                    <td class="separator">:</td>
                    <td class="value">
                        {{ $angsuran->pinjaman->kode_pinjaman }}
                    </td>

                    <td class="label">Tanggal Bayar</td>
                    <td class="separator">:</td>
                    <td class="value">
                        {{ $angsuran->tanggal_bayar?->format('d/m/Y') }}
                    </td>
                </tr>

                <tr>
                    <td>Nama Peminjam</td>
                    <td>:</td>
                    <td class="value">
                        {{ strtoupper($angsuran->pinjaman->anggota->user->name) }}
                    </td>

                    <td>Angsuran Ke</td>
                    <td>:</td>
                    <td class="value">
                        {{ $angsuran->angsuran_ke }}
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td class="value">
                        {{ strtoupper($angsuran->status) }}
                    </td>

                    <td>Jatuh Tempo</td>
                    <td>:</td>
                    <td class="value">
                        {{ $angsuran->jatuh_tempo?->format('d/m/Y') }}
                    </td>
                </tr>

            </table>

            <div class="nominal">
                Rp {{ number_format($angsuran->nominal, 0, ',', '.') }},-
            </div>

            <div
                style="
                    margin-top:8px;
                    font-style:italic;
                    font-size:12px;
                ">
                ({{ trim(terbilang($angsuran->nominal)) }} Rupiah)
            </div>

            <div class="footer">

                <table>

                    <tr>
                        <td>Petugas Koperasi,</td>
                        <td>Penyetor,</td>
                    </tr>

                    <tr>
                        <td class="ttd-space"></td>
                        <td class="ttd-space"></td>
                    </tr>

                    <tr>

                        <td>
                            <span class="garis">
                                (........................................)
                            </span>
                        </td>

                        <td>

                            <div class="nama">
                                {{ strtoupper($angsuran->pinjaman->anggota->user->name) }}
                            </div>

                            <span class="garis">
                                (........................................)
                            </span>

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

</body>

</html>
