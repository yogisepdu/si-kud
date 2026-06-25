<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penarikan extends Model
{
    protected $fillable = [
        'anggota_id',
        'kode_penarikan',
        'tanggal_penarikan',
        'jumlah_penarikan',
        'keterangan',
        'slip',
        'user_id',
    ];

    protected $casts = [
        'tanggal_penarikan' => 'date',
    ];

    protected static function booted(): void
    {
        static::creating(function (Penarikan $penarikan) {

            $last = static::whereYear('created_at', now()->year)
                ->count() + 1;

            $penarikan->kode_penarikan =
                'TRK/' .
                now()->format('Y/m') .
                '/' .
                str_pad($last, 5, '0', STR_PAD_LEFT);

            $penarikan->user_id = auth()->id();
        });
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
