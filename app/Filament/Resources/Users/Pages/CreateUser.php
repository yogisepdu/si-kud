<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        if ($this->record->role !== 'anggota') {
            return;
        }

        $anggota = $this->data['anggota'] ?? [];

        $this->record->anggota()->create([
            'no_anggota'        => $anggota['no_anggota'] ?? null,
            'nik'               => $anggota['nik'] ?? null,
            'alamat'            => $anggota['alamat'] ?? null,
            'no_hp'             => $anggota['no_hp'] ?? null,
            'jenis_petani'      => $anggota['jenis_petani'] ?? null,
            'tempat_lahir'      => $anggota['tempat_lahir'] ?? null,
            'tanggal_lahir'     => $anggota['tanggal_lahir'] ?? null,
            'jenis_kelamin'     => $anggota['jenis_kelamin'] ?? null,
            'luas_lahan'        => $anggota['luas_lahan'] ?? null,
            'blok_kebun'        => $anggota['blok_kebun'] ?? null,
            'tanggal_bergabung' => $anggota['tanggal_bergabung'] ?? now(),
            'status'            => $anggota['status'] ?? 'Aktif',
        ]);
    }
}
