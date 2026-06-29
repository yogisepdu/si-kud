<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\UserProfile;

class User extends Authenticatable implements FilamentUser
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


    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    protected static function booted(): void
    {
        static::created(function (User $user) {
            $user->profile()->create();
        });
    }

    public function isAdminOrPimpinan(): bool
    {
        return in_array($this->role, [
            self::ADMINISTRATOR,
            self::PIMPINAN,
        ]);
    }

    public function getPanelPrefix(): string
    {
        return match ($this->role) {
            self::ADMINISTRATOR => 'admin',
            self::PIMPINAN => 'pimpinan',
            self::ANGGOTA => 'anggota',
            default => '',
        };
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return match ($panel->getId()) {
            'admin' => $this->isAdmin(),
            'pimpinan' => $this->isPimpinan(),
            'anggota' => $this->isAnggota(),
            default => false,
        };
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
