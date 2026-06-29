<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements FilamentUser, HasAvatar
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

    /**
     * Selalu load profile agar avatar tidak menambah query.
     */
    protected $with = [
        'profile',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relasi
    |--------------------------------------------------------------------------
    */

    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    public function anggota(): HasOne
    {
        return $this->hasOne(Anggota::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Role
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | Filament
    |--------------------------------------------------------------------------
    */

    public function canAccessPanel(Panel $panel): bool
    {
        return match ($panel->getId()) {
            'admin' => $this->isAdmin(),
            'pimpinan' => $this->isPimpinan(),
            'anggota' => $this->isAnggota(),
            default => false,
        };
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

    /**
     * Avatar yang digunakan Filament pada Topbar.
     */
    public function getFilamentAvatarUrl(): ?string
    {
        if (! $this->profile?->avatar) {
            return null;
        }

        return Storage::disk('public')->url($this->profile->avatar);
    }
}
