<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 11px;
        }

        h2,
        h3,
        p {
            margin: 0;
            padding: 0;
        }

        .center {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 6px;
        }

        table th {
            background: #eeeeee;
        }

        .text-right {
            text-align: right;
        }

        .footer {
            margin-top: 60px;
            width: 100%;
        }

        .signature {
            width: 250px;
            float: right;
            text-align: center;
        }
    </style>

</head>

<body>

    <div class="center">

        <h2>KOPERASI SERBA USAHA</h2>

        <h3>LAPORAN BULANAN</h3>

        <p>{{ $periode }}</p>

    </div>

    <table>

        <thead>

            <tr>

                <th width="40">No</th>

                <th>No Anggota</th>

                <th>Nama Anggota</th>

                <th>Simpanan</th>

                <th>Pinjaman</th>

                <th>Angsuran</th>

                <th>Sisa Pinjaman</th>

            </tr>

        </thead>

        <tbody>

            @php

                $totalSimpanan = 0;
                $totalPinjaman = 0;
                $totalAngsuran = 0;
                $totalSisa = 0;

            @endphp

            @foreach ($laporan as $row)
                @php

                    $totalSimpanan += $row->total_simpanan;
                    $totalPinjaman += $row->total_pinjaman;
                    $totalAngsuran += $row->total_angsuran;
                    $totalSisa += $row->sisa_pinjaman;

                @endphp

                <tr>

                    <td align="center">

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        {{ $row->kode }}

                    </td>

                    <td>

                        {{ $row->nama }}

                    </td>

                    <td class="text-right">

                        {{ number_format($row->total_simpanan, 0, ',', '.') }}

                    </td>

                    <td class="text-right">

                        {{ number_format($row->total_pinjaman, 0, ',', '.') }}

                    </td>

                    <td class="text-right">

                        {{ number_format($row->total_angsuran, 0, ',', '.') }}

                    </td>

                    <td class="text-right">

                        {{ number_format($row->sisa_pinjaman, 0, ',', '.') }}

                    </td>

                </tr>
            @endforeach

        </tbody>

        <tfoot>

            <tr>

                <th colspan="3">

                    TOTAL

                </th>

                <th class="text-right">

                    {{ number_format($totalSimpanan, 0, ',', '.') }}

                </th>

                <th class="text-right">

                    {{ number_format($totalPinjaman, 0, ',', '.') }}

                </th>

                <th class="text-right">

                    {{ number_format($totalAngsuran, 0, ',', '.') }}

                </th>

                <th class="text-right">

                    {{ number_format($totalSisa, 0, ',', '.') }}

                </th>

            </tr>

        </tfoot>

    </table>

    <div class="footer">

        <div class="signature">

            Kampar,

            {{ now()->translatedFormat('d F Y') }}

            <br><br><br><br><br>

            _______________________

        </div>

    </div>

</body>

</html>
