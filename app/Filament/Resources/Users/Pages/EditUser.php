<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if ($this->record->anggota) {
            $data['anggota'] = $this->record->anggota->only([
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
            ]);
        }

        return $data;
    }

    protected function afterSave(): void
    {
        if ($this->record->role !== 'anggota') {
            return;
        }

        $anggotaData = $this->data['anggota'] ?? [];

        $this->record->anggota()->updateOrCreate(
            [
                'user_id' => $this->record->id,
            ],
            $anggotaData
        );
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
