<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KritikSaran extends Model
{
    //
    protected $table = 'kritik_sarans';

    protected $fillable = [
        'nama',
        'email',
        'judul',
        'pesan',
        'dibaca',
        'balasan',
        'dibalas_pada',
    ];

    protected $casts = [
        'dibaca' => 'boolean',
        'dibalas_pada' => 'datetime',
    ];
}
