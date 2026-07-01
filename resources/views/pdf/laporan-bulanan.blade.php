<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <style>
        @page {
            margin: 20px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #000;
        }

        * {
            box-sizing: border-box;
        }

        h1,
        h2,
        h3,
        p {
            margin: 0;
            padding: 0;
        }

        .header {
            width: 100%;
            margin-bottom: 20px;
        }

        .logo {
            width: 70px;
            text-align: center;
        }

        .logo img {
            width: 65px;
        }

        .title {
            text-align: center;
        }

        .title h1 {
            font-size: 22px;
            font-weight: bold;
        }

        .title h2 {
            font-size: 16px;
            margin-top: 6px;
        }

        .title p {
            margin-top: 5px;
            font-size: 12px;
        }

        .summary {
            width: 100%;
            margin-bottom: 15px;
        }

        .summary td {
            border: none;
            padding: 2px 0;
        }

        .summary .label {
            width: 140px;
            font-weight: bold;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        table.data th,
        table.data td {
            border: .6px solid #000;
            padding: 6px;
        }

        table.data th {
            background: #E8E8E8;
            text-align: center;
            font-weight: bold;
        }

        table.data td {
            vertical-align: middle;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        tfoot th {
            background: #DCDCDC;
            font-weight: bold;
        }

        .footer {
            margin-top: 60px;
            width: 100%;
        }

        .signature {
            width: 100%;
            border: none;
        }

        .signature td {
            border: none;
            text-align: center;
            width: 33%;
            vertical-align: top;
        }

        .signature-name {
            margin-top: 70px;
            font-weight: bold;
            text-decoration: underline;
        }

        .small {
            font-size: 10px;
        }
    </style>

</head>

<body>

    {{-- ================= HEADER ================= --}}
    <table class="header">

        <tr>

            <td
                class="logo"
                width="80"
            >

                @if (file_exists(public_path('assets/img/logo.jpeg')))
                    <img src="{{ public_path('assets/img/logo.jpeg') }}">
                @endif

            </td>

            <td class="title">

                <h1>KOPERASI SERBA USAHA KAMPAR</h1>

                <h2>LAPORAN BULANAN</h2>

                <p>{{ $periode }}</p>

            </td>

            <td width="80"></td>

        </tr>

    </table>

    {{-- ================= RINGKASAN ================= --}}
    @php

        $totalSimpanan = 0;
        $totalPinjaman = 0;
        $totalAngsuran = 0;
        $totalSisa = 0;

    @endphp

    <table class="summary">

        <tr>

            <td class="label">Periode</td>

            <td>: {{ $periode }}</td>

            <td class="label">Jumlah Anggota</td>

            <td>: {{ $laporan->count() }}</td>

        </tr>

    </table>

    {{-- ================= TABEL ================= --}}
    <table class="data">

        <thead>

            <tr>

                <th width="40">No</th>

                <th width="90">No Anggota</th>

                <th>Nama Anggota</th>

                <th width="120">Simpanan</th>

                <th width="120">Pinjaman</th>

                <th width="120">Angsuran</th>

                <th width="120">Sisa Pinjaman</th>

            </tr>

        </thead>

        <tbody>

            @forelse($laporan as $row)
                @php

                    $totalSimpanan += $row->total_simpanan;
                    $totalPinjaman += $row->total_pinjaman;
                    $totalAngsuran += $row->total_angsuran;
                    $totalSisa += $row->sisa_pinjaman;

                @endphp

                <tr>

                    <td class="center">

                        {{ $loop->iteration }}

                    </td>

                    <td class="center">

                        {{ $row->kode }}

                    </td>

                    <td>

                        {{ $row->nama }}

                    </td>

                    <td class="right">

                        Rp {{ number_format($row->total_simpanan, 0, ',', '.') }}

                    </td>

                    <td class="right">

                        Rp {{ number_format($row->total_pinjaman, 0, ',', '.') }}

                    </td>

                    <td class="right">

                        Rp {{ number_format($row->total_angsuran, 0, ',', '.') }}

                    </td>

                    <td class="right">

                        Rp {{ number_format($row->sisa_pinjaman, 0, ',', '.') }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="7"
                        class="center"
                    >

                        Tidak ada data.

                    </td>

                </tr>
            @endforelse

        </tbody>

        <tfoot>

            <tr>

                <th
                    colspan="3"
                    class="center"
                >

                    TOTAL

                </th>

                <th class="right">

                    Rp {{ number_format($totalSimpanan, 0, ',', '.') }}

                </th>

                <th class="right">

                    Rp {{ number_format($totalPinjaman, 0, ',', '.') }}

                </th>

                <th class="right">

                    Rp {{ number_format($totalAngsuran, 0, ',', '.') }}

                </th>

                <th class="right">

                    Rp {{ number_format($totalSisa, 0, ',', '.') }}

                </th>

            </tr>

        </tfoot>

    </table>

    {{-- ================= FOOTER ================= --}}
    <div class="footer">

        <table
            width="100%"
            style="border:none;"
        >

            <tr>
                <td
                    style="
            border:none;
            text-align:center;
            padding-bottom:15px;
            font-size:12px;
        ">
                    Kampar, {{ now()->translatedFormat('d F Y') }}
                </td>

                <td style="border:none;"></td>

                <td style="border:none;"></td>
            </tr>

            <tr>

                <td style="border:none;text-align:center;font-weight:bold;">
                    Ketua
                </td>

                <td style="border:none;text-align:center;font-weight:bold;">
                    Sekretaris
                </td>

                <td style="border:none;text-align:center;font-weight:bold;">
                    Bendahara
                </td>

            </tr>

            <tr>

                <td style="border:none;height:90px;"></td>

                <td style="border:none;"></td>

                <td style="border:none;"></td>

            </tr>

            <tr>

                <td style="border:none;text-align:center;">
                    <span
                        style="display:inline-block;width:180px;border-bottom:1px solid #000;padding-top:5px;font-weight:bold;"
                    >
                        (........................)
                    </span>
                </td>

                <td style="border:none;text-align:center;">
                    <span
                        style="display:inline-block;width:180px;border-bottom:1px solid #000;padding-top:5px;font-weight:bold;"
                    >
                        (........................)
                    </span>
                </td>

                <td style="border:none;text-align:center;">
                    <span
                        style="display:inline-block;width:180px;border-bottom:1px solid #000;padding-top:5px;font-weight:bold;"
                    >
                        (........................)
                    </span>
                </td>

            </tr>

            <tr>

                <td style="border:none;text-align:center;font-size:10px;">
                    NIK. .....................
                </td>

                <td style="border:none;text-align:center;font-size:10px;">
                    NIK. .....................
                </td>

                <td style="border:none;text-align:center;font-size:10px;">
                    NIK. .....................
                </td>

            </tr>

        </table>

    </div>

</body>

</html>
