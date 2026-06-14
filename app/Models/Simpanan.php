<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    //
    protected $fillable = [
        'anggota_id',
        'kode_simpanan',
        'tanggal',
        'jenis',
        'jumlah',
        'keterangan',
        'status',
        'verified_by',
        'verified_at',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'verified_at' => 'datetime',
        ];
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function verifier()
    {
        return $this->belongsTo(
            User::class,
            'verified_by'
        );
    }
}
