<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Angsuran;
use App\Services\GenerateSlipAngsuranService;
use Barryvdh\DomPDF\Facade\Pdf;

class SlipAngsuranController extends Controller
{
    //
    public function download(Angsuran $angsuran)
    {
        $pdf = Pdf::loadView(
            'angsurans.pdf.slip-angsuran',
            [
                'angsuran' => $angsuran,
            ]
        );

        return $pdf->download(
            'Slip-Angsuran-' . $angsuran->id . '.pdf'
        );
    }
}
