<?php

namespace App\Http\Controllers;

use App\Services\LaporanBulananService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanBulananPdfController extends Controller
{
    public function __invoke(
        Request $request,
        LaporanBulananService $service,
    ) {
        // Validasi input
        $validated = $request->validate([
            'bulan' => ['nullable', 'integer', 'between:1,12'],
            'tahun' => ['nullable', 'integer', 'digits:4'],
        ]);

        $bulan = $validated['bulan'] ?? now()->month;
        $tahun = $validated['tahun'] ?? now()->year;

        // Data laporan
        $laporan = $service->getData(
            bulan: $bulan,
            tahun: $tahun,
        );

        // Ringkasan
        $summary = [
            'anggota'  => $laporan->count(),
            'simpanan' => $laporan->sum('total_simpanan'),
            'pinjaman' => $laporan->sum('total_pinjaman'),
            'angsuran' => $laporan->sum('total_angsuran'),
            'sisa'     => $laporan->sum('sisa_pinjaman'),
        ];

        // Nama file
        $filename = sprintf(
            'Laporan-Bulanan-%02d-%d.pdf',
            $bulan,
            $tahun,
        );

        return Pdf::loadView(
            'pdf.laporan-bulanan',
            [
                'laporan' => $laporan,
                'summary' => $summary,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'periode' => $service->getPeriode(
                    $bulan,
                    $tahun,
                ),
                'tanggalCetak' => now(),
            ]
        )
            ->setPaper('a4', 'landscape')
            ->stream($filename);
    }
}