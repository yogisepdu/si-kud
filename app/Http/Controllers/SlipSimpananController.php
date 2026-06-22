<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SlipSimpananController extends Controller
{
    //
    public function download(Simpanan $simpanan)
    {
        $user = auth()->user();

        // anggota hanya boleh lihat slip miliknya
        if ($user->role === 'anggota') {

            abort_unless(
                $simpanan->anggota->user_id === $user->id,
                403
            );
        }

        abort_unless(
            $simpanan->status === 'terverifikasi',
            404
        );

        $pdf = Pdf::loadView('simpanans.pdf.slip-simpanan', [
            'simpanan' => $simpanan,
            'total' => $simpanan->items->sum('jumlah'),
        ]);

        return $pdf->stream(
            'Slip-' . $simpanan->kode_simpanan . '.pdf'
        );
    }
}
