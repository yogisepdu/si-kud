<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Slip Penarikan Simpanan</title>

    <style>
        * {
            box-sizing: border-box;
        }

        @page {
            size: A4 portrait;
            margin: 12mm;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 12px;
            color: #222;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            border: 2px solid #000;
            padding: 12px 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* ===========================
           HEADER
        ============================== */

        .header td {
            vertical-align: top;
        }

        .logo {
            width: 58px;
            height: auto;
        }

        .koperasi {
            padding-left: 10px;
        }

        .koperasi h1 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .koperasi h2 {
            margin: 0;
            font-size: 13px;
            font-weight: bold;
        }

        .koperasi p {
            margin-top: 3px;
            font-size: 10px;
            line-height: 14px;
        }

        .judul {
            text-align: right;
            font-size: 24px;
            font-weight: bold;
            vertical-align: middle;
        }

        hr {
            border: none;
            border-top: 2px solid #000;
            margin: 10px 0 12px;
        }

        /* ===========================
           DATA TRANSAKSI
        ============================== */

        .info td {
            padding: 3px 4px;
            vertical-align: top;
        }

        .label {
            width: 140px;
            font-weight: bold;
        }

        /* ===========================
           BOX NOMINAL
        ============================== */

        .nominal-box {

            margin: 12px 0;

            border: 2px solid #000;

            text-align: center;

            padding: 10px;

        }

        .nominal-title {

            font-size: 14px;

            font-weight: bold;

        }

        .nominal {

            font-size: 28px;

            font-weight: bold;

            margin-top: 8px;

        }

        .terbilang {

            margin-top: 8px;

            font-size: 11px;

            font-style: italic;

        }

        /* ===========================
           TABEL SALDO
        ============================== */

        .saldo-table {

            margin-top: 12px;

        }

        .saldo-table th {

            border: 1px solid #000;

            background: #f0f0f0;

            padding: 6px;

            font-size: 11px;

        }

        .saldo-table td {

            border: 1px solid #000;

            padding: 6px;

            font-size: 11px;

        }

        /* ===========================
           KETERANGAN
        ============================== */

        .keterangan {

            margin-top: 12px;

            border: 1px solid #000;

            padding: 8px;

            min-height: 45px;

            font-size: 11px;

        }

        /* ===========================
           TANDA TANGAN
        ============================== */

        .ttd {

            margin-top: 20px;

        }

        .ttd td {

            text-align: center;

            width: 33.33%;

            font-size: 11px;

        }

        .garis {

            margin-top: 45px;

            border-top: 1px solid #000;

            width: 130px;

            display: inline-block;

        }

        /* ===========================
           FOOTER
        ============================== */

        .footer {

            margin-top: 12px;

            text-align: center;

            font-size: 9px;

            color: #666;

        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }

        .uppercase {
            text-transform: uppercase;
        }
    </style>

</head>

<body>

    <div class="container">
        {{-- ===============================
        HEADER
    ================================ --}}

        <table class="header">

            <tr>

                <td width="65">

                    <img class="logo" src="{{ public_path('assets/img/logo.jpeg') }}">

                </td>

                <td class="koperasi">

                    <h2>KOPERASI SIMPAN PINJAM</h2>

                    <h1>SI-KUD KAMPAR</h1>

                    <p>
                        Jl. Prof. M. Yamin No. 01<br>
                        Bangkinang Kota, Kabupaten Kampar<br>
                        Provinsi Riau
                    </p>

                </td>

                <td class="judul">

                    SLIP PENARIKAN

                </td>

            </tr>

        </table>

        <hr>

        {{-- ===============================
        INFORMASI TRANSAKSI
    ================================ --}}

        <table class="info">

            <tr>

                <td class="label">Kode Penarikan</td>

                <td width="230">
                    : {{ $penarikan->kode_penarikan }}
                </td>

                <td class="label">Tanggal Penarikan</td>

                <td>
                    : {{ $penarikan->tanggal_penarikan->translatedFormat('d F Y') }}
                </td>

            </tr>

            <tr>

                <td class="label">No. Anggota</td>

                <td>
                    : {{ $penarikan->anggota->no_anggota }}
                </td>

                <td class="label">Status</td>

                <td>

                    :

                    <strong>

                        {{ strtoupper($penarikan->status) }}

                    </strong>

                </td>

            </tr>

            <tr>

                <td class="label">Nama Anggota</td>

                <td>

                    :

                    {{ $penarikan->anggota->user->name }}

                </td>

                <td class="label">

                    Diverifikasi Oleh

                </td>

                <td>

                    :

                    {{ optional($penarikan->verifier)->name ?? '-' }}

                </td>

            </tr>

            <tr>

                <td class="label">

                    Tanggal Verifikasi

                </td>

                <td>

                    :

                    {{ optional($penarikan->verified_at)?->translatedFormat('d F Y H:i') ?? '-' }}

                </td>

                <td class="label">

                    Petugas Input

                </td>

                <td>

                    :

                    {{ $penarikan->user->name }}

                </td>

            </tr>

        </table>


        {{-- ===============================
        NOMINAL PENARIKAN
    ================================ --}}

        <div class="nominal-box">

            <div class="nominal-title">

                JUMLAH PENARIKAN

            </div>

            <div class="nominal">

                Rp {{ number_format($penarikan->jumlah_penarikan, 0, ',', '.') }}

            </div>

            <div class="terbilang">

                ({{ ucwords(trim(terbilang($penarikan->jumlah_penarikan))) }}
                Rupiah)

            </div>

        </div>


        {{-- ===============================
        RINGKASAN SALDO
    ================================ --}}

        <table class="saldo-table">

            <thead>

                <tr>

                    <th width="40%">

                        Keterangan

                    </th>

                    <th>

                        Nominal

                    </th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>

                        Saldo Sebelum Penarikan

                    </td>

                    <td class="text-right">

                        Rp {{ number_format($saldoSebelum, 0, ',', '.') }}

                    </td>

                </tr>

                <tr>

                    <td>

                        Jumlah Penarikan

                    </td>

                    <td class="text-right">

                        Rp {{ number_format($penarikan->jumlah_penarikan, 0, ',', '.') }}

                    </td>

                </tr>

                <tr>

                    <td>

                        <strong>

                            Saldo Setelah Penarikan

                        </strong>

                    </td>

                    <td class="text-right">

                        <strong>

                            Rp {{ number_format($saldoSesudah, 0, ',', '.') }}

                        </strong>

                    </td>

                </tr>

            </tbody>

        </table>


        {{-- ===============================
        KETERANGAN
    ================================ --}}

        <div class="keterangan">

            <strong>

                Keterangan

            </strong>

            <br><br>

            {{ $penarikan->keterangan ?: 'Tidak ada keterangan.' }}

        </div>
        {{-- ===============================
        TANDA TANGAN
    ================================ --}}

        <table class="ttd">

            <tr>

                <td>

                    Petugas

                </td>

                <td>

                    Menyetujui

                </td>

                <td>

                    Anggota

                </td>

            </tr>

            <tr>

                <td style="height: 65px; vertical-align: bottom;">

                    <div class="garis"></div>

                    <br>

                    <strong>

                        {{ $penarikan->user->name }}

                    </strong>

                </td>

                <td style="height: 65px; vertical-align: bottom;">

                    <div class="garis"></div>

                    <br>

                    <strong>

                        {{ optional($penarikan->verifier)->name ?? '-' }}

                    </strong>

                </td>

                <td style="height: 65px; vertical-align: bottom;">

                    <div class="garis"></div>

                    <br>

                    <strong>

                        {{ $penarikan->anggota->user->name }}

                    </strong>

                </td>

            </tr>

        </table>

        {{-- ===============================
        FOOTER
    ================================ --}}

        <div class="footer">

            <strong>
                Sistem Informasi Koperasi Unit Desa (SI-KUD)
            </strong>

            <br>

            Slip ini dicetak secara otomatis sebagai bukti sah transaksi
            penarikan simpanan.

            <br>

            Dicetak pada :

            {{ now()->translatedFormat('d F Y H:i:s') }}

        </div>

    </div>

</body>

</html>
