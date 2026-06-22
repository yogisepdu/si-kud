<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimpananItem extends Model
{
    protected $fillable = [
        'simpanan_id',
        'jenis',
        'jumlah'
    ];

    public function simpanan()
    {
        return $this->belongsTo(Simpanan::class);
    }
}
