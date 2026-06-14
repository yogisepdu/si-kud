<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Angsuran;

class Pinjaman extends Model
{

    protected $casts = [
        'approved_at' => 'datetime',
        'tanggal_pengajuan' => 'date',
    ];

    protected $fillable = [
        'anggota_id',
        'kode_pinjaman',
        'tanggal_pengajuan',

        'jumlah_pinjaman',
        'jangka_waktu',

        'persentase_bunga',
        'total_bunga',
        'total_pinjaman',
        'angsuran_per_bulan',

        'tujuan_pinjaman',

        'status',

        'approved_by',
        'approved_at',

        'no_hp',
        'email',

        'jaminan',

        'file_ktp',
        'file_kk',
        'file_bukti_penghasilan',
        'file_agunan',
        'file_dokumen_pendukung',

        'catatan_pimpinan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_pengajuan' => 'date',
            'approved_at' => 'datetime',
        ];
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function angsurans(): HasMany
    {
        return $this->hasMany(Angsuran::class);
    }
}
