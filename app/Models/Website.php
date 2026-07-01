<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    //
    protected $fillable = [
        'nama',
    ];

    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }

    public function pengumumen()
    {
        return $this->hasMany(Pengumuman::class);
    }
}
