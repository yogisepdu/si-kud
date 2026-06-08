<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const ADMINISTRATOR = 'administrator';
    public const PIMPINAN = 'pimpinan';
    public const ANGGOTA = 'anggota';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isAdmin(): bool
    {
        return $this->role === self::ADMINISTRATOR;
    }

    public function isPimpinan(): bool
    {
        return $this->role === self::PIMPINAN;
    }

    public function isAnggota(): bool
    {
        return $this->role === self::ANGGOTA;
    }

    public function isAdminOrPimpinan(): bool
    {
        return in_array($this->role, [
            self::ADMINISTRATOR,
            self::PIMPINAN,
        ]);
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}