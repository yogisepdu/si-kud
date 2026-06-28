<?php

namespace App\Http\Controllers;

use App\Models\Penarikan;
use Barryvdh\DomPDF\Facade\Pdf;

class SlipPenarikanController extends Controller
{
    public function download(Penarikan $penarikan)
    {
        $user = auth()->user();

        /**
         * Anggota hanya boleh melihat slip miliknya sendiri.
         */
        if ($user->isAnggota()) {

            abort_unless(
                $penarikan->anggota->user_id === $user->id,
                403
            );
        }

        /**
         * Slip hanya bisa dicetak jika penarikan telah disetujui.
         */
        abort_unless(
            $penarikan->status === 'disetujui',
            404
        );

        /*
        |--------------------------------------------------------------------------
        | Saldo Sukarela
        |--------------------------------------------------------------------------
        */

        $saldoSesudah = $penarikan->anggota->saldo_sukarela;

        $saldoSebelum = $saldoSesudah + $penarikan->jumlah_penarikan;

        $pdf = Pdf::loadView(
            'penarikans.pdf.slip-penarikan',
            [
                'penarikan'    => $penarikan,
                'saldoSebelum' => $saldoSebelum,
                'saldoSesudah' => $saldoSesudah,
            ]
        )->setPaper('a4', 'landscape');

        $filename = str($penarikan->kode_penarikan)
            ->replace('/', '-')
            ->replace('\\', '-');

        return $pdf->stream(
            "Slip-Penarikan-{$filename}.pdf"
        );
    }
}
