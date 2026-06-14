<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class Angsuran extends Model
{
    //
    protected $fillable = [
        'pinjaman_id',
        'angsuran_ke',
        'jatuh_tempo',
        'nominal',
        'tanggal_bayar',
        'bukti_bayar',
        'status',
        'slip_pembayaran',
        'verified_by',
        'verified_at',
        'catatan_verifikasi',
    ];

    protected $casts = [
        'jatuh_tempo' => 'date',
        'tanggal_bayar' => 'date',
        'verified_at' => 'datetime',
    ];

    public function generateSlip(): string
    {
        $pdf = Pdf::loadView(
            'pdf.slip-angsuran',
            [
                'angsuran' => $this,
            ]
        );

        $path = sprintf(
            'slip-angsuran/%s-%s.pdf',
            $this->pinjaman->kode_pinjaman,
            $this->angsuran_ke
        );

        Storage::disk('public')->put(
            $path,
            $pdf->output()
        );

        $this->update([
            'slip_pembayaran' => $path,
        ]);

        return $path;
    }

    /**
     * Relasi ke Pinjaman
     */
    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class);
    }

    /**
     * Relasi ke User yang memverifikasi
     */
    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
