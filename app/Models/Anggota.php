<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\Angsuran;

class Anggota extends Model
{
    //
    protected $fillable = [
        'user_id',
        'no_anggota',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'jenis_petani',
        'luas_lahan',
        'blok_kebun',
        'tanggal_bergabung',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pinjamans()
    {
        return $this->hasMany(Pinjaman::class);
    }

    public function angsurans(): HasManyThrough
    {
        return $this->hasManyThrough(
            Angsuran::class,
            Pinjaman::class,
            'anggota_id', // foreign key di pinjamans
            'pinjaman_id', // foreign key di angsurans
            'id', // local key anggota
            'id' // local key pinjaman
        );
    }

    public function simpanans()
    {
        return $this->hasMany(Simpanan::class);
    }
}
