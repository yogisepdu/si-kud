<?php

namespace App\Http\Controllers;

use App\Services\LaporanBulananService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanBulananPdfController extends Controller
{
    public function __invoke(
        Request $request,
        LaporanBulananService $service
    ) {
        $bulan = (int) $request->get('bulan', now()->month);
        $tahun = (int) $request->get('tahun', now()->year);

        $laporan = $service->getData(
            $bulan,
            $tahun
        );

        return Pdf::loadView(
            'pdf.laporan-bulanan',
            [
                'laporan' => $laporan,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'periode' => $service->getPeriode($bulan, $tahun),
            ]
        )
            ->setPaper('A4', 'landscape')
            ->stream("laporan-bulanan-$bulan-$tahun.pdf");
    }
}