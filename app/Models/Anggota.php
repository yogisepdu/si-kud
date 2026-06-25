<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\Angsuran;
use App\Models\SimpananItem;

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

    public function getNamaAttribute(): string
    {
        return $this->user?->name ?? '-';
    }

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

    public function penarikans()
    {
        return $this->hasMany(Penarikan::class);
    }

    public function getSaldoPokokAttribute(): float
    {
        return SimpananItem::query()
            ->where('jenis', 'pokok')
            ->whereHas(
                'simpanan',
                fn($q) =>
                $q->where('anggota_id', $this->id)
            )
            ->sum('jumlah');
    }

    public function getSaldoWajibAttribute(): float
    {
        return SimpananItem::query()
            ->where('jenis', 'wajib')
            ->whereHas(
                'simpanan',
                fn($q) =>
                $q->where('anggota_id', $this->id)
            )
            ->sum('jumlah');
    }

    public function getSaldoSukarelaAttribute(): float
    {
        $simpanan = SimpananItem::query()
            ->where('jenis', 'sukarela')
            ->whereHas(
                'simpanan',
                fn($q) =>
                $q->where('anggota_id', $this->id)
            )
            ->sum('jumlah');

        $penarikan = $this->penarikans()
            ->sum('jumlah_penarikan');

        return $simpanan - $penarikan;
    }

    public function simpanans()
    {
        return $this->hasMany(Simpanan::class);
    }
}
