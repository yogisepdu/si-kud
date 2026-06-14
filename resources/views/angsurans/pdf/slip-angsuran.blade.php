<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <style>
        @page {
            margin: 15px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #000;
        }

        .slip {
            border: 1px solid #000;
            padding: 0;
        }

        .header {
            padding: 10px 15px;
            border-bottom: 1px solid #000;
        }

        .header table {
            width: 100%;
        }

        .logo {
            width: 80px;
            height: 80px;
        }

        .koperasi {
            text-align: center;
        }

        .koperasi h1 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .koperasi h2 {
            margin: 0;
            font-size: 22px;
            font-weight: bold;
        }

        .alamat {
            font-size: 10px;
            text-align: right;
            line-height: 1.4;
        }

        .title {
            text-align: center;
            color: #c40000;
            font-size: 22px;
            font-weight: bold;
            margin: 12px 0;
            text-transform: uppercase;
        }

        .content {
            padding: 0 15px 15px;
        }

        .content table {
            width: 100%;
            border-collapse: collapse;
        }

        .content td {
            padding: 4px;
            vertical-align: top;
        }

        .label {
            width: 130px;
        }

        .separator {
            width: 10px;
        }

        .nominal {
            font-size: 16px;
            font-weight: bold;
        }

        .terbilang {
            margin-top: 10px;
            padding: 8px;
            border: 1px dashed #888;
            font-style: italic;
        }

        .footer {
            border-top: 1px dashed #000;
            margin-top: 20px;
            padding-top: 20px;
        }

        .footer table {
            width: 100%;
        }

        .ttd {
            text-align: center;
            width: 50%;
        }

        .space {
            height: 70px;
        }

        .name {
            text-decoration: underline;
            font-weight: bold;
        }

        .watermark {
            position: fixed;
            top: 45%;
            left: 20%;
            opacity: 0.05;
            font-size: 90px;
            transform: rotate(-30deg);
        }
    </style>
</head>

<body>

    <div class="watermark">
        SI-KUD
    </div>

    <div class="slip">

        <div class="header">

            <table>
                <tr>

                    <td width="15%">
                        {{-- Ganti dengan logo koperasi --}}
                        {{-- <img src="{{ public_path('images/logo.png') }}" class="logo"> --}}
                    </td>

                    <td class="koperasi" width="55%">
                        <h1>KOPERASI SIMPAN PINJAM</h1>
                        <h2>SI-KUD</h2>
                    </td>

                    <td class="alamat" width="30%">
                        Jl. Contoh Alamat Koperasi<br>
                        Kecamatan XXXXX<br>
                        Kabupaten XXXXX<br>
                        Telp. XXXXXXXX
                    </td>

                </tr>
            </table>

        </div>

        <div class="title">
            Bukti Pembayaran Angsuran
        </div>

        <div class="content">

            <table>

                <tr>

                    <td class="label">Nama Peminjam</td>
                    <td class="separator">:</td>
                    <td>
                        {{ $angsuran->pinjaman->anggota->user->name }}
                    </td>

                    <td class="label">Kode Pinjaman</td>
                    <td class="separator">:</td>
                    <td>
                        {{ $angsuran->pinjaman->kode_pinjaman }}
                    </td>

                </tr>

                <tr>

                    <td>Angsuran Ke</td>
                    <td>:</td>
                    <td>
                        {{ $angsuran->angsuran_ke }}
                    </td>

                    <td>Tanggal Bayar</td>
                    <td>:</td>
                    <td>
                        {{ $angsuran->tanggal_bayar?->format('d F Y') }}
                    </td>

                </tr>

                <tr>

                    <td>Jumlah Angsuran</td>
                    <td>:</td>
                    <td class="nominal" colspan="4">
                        Rp {{ number_format($angsuran->nominal, 0, ',', '.') }}
                    </td>

                </tr>

            </table>

            <div class="terbilang">
                Terbilang:
                ...................................................................................................................
            </div>

            <div style="margin-top:15px;">
                Pembayaran angsuran telah diterima dan diverifikasi oleh petugas koperasi.
            </div>

            <div class="footer">

                <table>

                    <tr>
                        <td class="ttd">
                            Kasir
                        </td>

                        <td class="ttd">
                            Penyetor
                        </td>
                    </tr>

                    <tr>
                        <td class="space"></td>
                        <td class="space"></td>
                    </tr>

                    <tr>

                        <td class="ttd">
                            <span class="name">
                                ___________________
                            </span>
                        </td>

                        <td class="ttd">
                            <span class="name">
                                {{ strtoupper($angsuran->pinjaman->anggota->user->name) }}
                            </span>
                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

</body>

</html>
