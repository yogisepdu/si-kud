<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Slip Setoran Simpanan</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 14px;
            margin: 18px;
        }

        .container {
            border: 2px solid #000;
            padding: 14px;
        }

        .header {
            width: 100%;
            border-collapse: collapse;
        }

        .header td {
            vertical-align: top;
        }

        .logo {
            width: 80px;
        }

        .koperasi {
            padding-left: 10px;
        }

        .koperasi h1 {
            margin: 0;
            font-size: 20px;
        }

        .koperasi h2 {
            margin: 0;
            font-size: 14px;
        }

        .koperasi p {
            margin: 2px 0;
            font-size: 13px;
        }

        .judul-slip {
            text-align: right;
            font-size: 28px;
            font-weight: bold;
        }

        .space {
            height: 20px;
        }

        .info-awal {
            width: 100%;
            margin: 20px 0;
        }

        .data {
            width: 100%;
            border-collapse: collapse;
        }

        .data td {
            padding: 5px 0;
        }

        .label {
            width: 180px;
        }

        .titik {
            width: 15px;
        }

        .nilai {
            border-bottom: 1px dotted #000;
            font-weight: bold;
        }

        .left {
            width: 55%;
            float: left;
        }

        .right {
            width: 40%;
            float: right;
        }

        .ttd-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .ttd-table th,
        .ttd-table td {
            border: 1px solid #000;
        }

        .ttd-box {
            height: 75px;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>

    <div class="container">

        {{-- HEADER --}}
        <table class="header">
            <tr>
                <td width="80">
                    <img class="logo" src="{{ public_path('assets/img/logo.jpeg') }}">
                </td>

                <td class="koperasi">
                    <h2>Koperasi Simpan Pinjam</h2>
                    <h1>SI-KUD Kampar</h1>
                    <p>Kantor : <br>
                        Jl. Prof. M. Yamin No. 01<br>
                        Bangkinang Kota<br>
                        Kabupaten Kampar<br>
                        Provinsi Riau</p>
                </td>

                <td class="judul-slip">SLIP SETORAN</td>
            </tr>
        </table>

        {{-- INFO --}}
        <table class="info-awal">
            <tr>
                <td><strong>No :</strong> {{ $simpanan->kode_simpanan }}</td>
                <td align="right">
                    <strong>Tanggal :</strong>
                    {{ $simpanan->tanggal->format('d-m-Y') }}
                </td>
            </tr>
        </table>

        {{-- DATA --}}
        <table class="data">

            <tr>
                <td class="label">No. Rekening</td>
                <td class="titik">:</td>
                <td class="nilai">{{ $simpanan->anggota->no_anggota }}</td>
            </tr>

            <tr>
                <td class="label">Nama</td>
                <td class="titik">:</td>
                <td class="nilai">{{ $simpanan->anggota->user->name }}</td>
            </tr>

            <tr>
                <td class="label">Terbilang</td>
                <td class="titik">:</td>
                <td class="nilai">
                    ({{ trim(terbilang($total)) }} Rupiah)
                </td>
            </tr>

        </table>

        <div class="space"></div>

        {{-- LEFT --}}
        <div class="left">

            <table class="data">

                @foreach ($simpanan->items as $item)
                    <tr>
                        <td class="label">
                            Simpanan {{ ucfirst($item->jenis) }}
                        </td>
                        <td class="titik">:</td>
                        <td class="nilai">
                            Rp {{ number_format($item->jumlah, 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td class="label"><strong>JUMLAH</strong></td>
                    <td class="titik">:</td>
                    <td class="nilai">
                        <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong>
                    </td>
                </tr>

            </table>

        </div>

        {{-- RIGHT --}}
        <div class="right">

            <div style="margin-bottom:10px;">
                Jenis Setoran:
                <span style="margin-left:5px;">
                    [ ] Simpanan
                </span>
                <span style="margin-left:5px;">
                    [ ] Pinjaman
                </span>
            </div>

            <table class="ttd-table">
                <tr>
                    <th>Petugas</th>
                    <th>Anggota</th>
                </tr>
                <tr>
                    <td class="ttd-box"></td>
                    <td class="ttd-box"></td>
                </tr>
            </table>

        </div>

        <div class="clear"></div>

    </div>

</body>

</html>
