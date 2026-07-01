<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Berita extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'judul',
        'slug',
        'gambar',
        'tanggal',
        'ringkasan',
        'isi',
        'views',
        'is_publish',
    ];

    protected static function booted()
    {
        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
        });
    }

    protected $casts = [
        'tanggal' => 'date',
        'is_publish' => 'boolean',
    ];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
