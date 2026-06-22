<?php

namespace App\Filament\Resources\Simpanans\Pages;

use App\Models\Simpanan;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Simpanans\SimpananResource;
use Filament\Forms\Components\Hidden;

class CreateSimpanan extends CreateRecord
{
    protected static string $resource = SimpananResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $last = Simpanan::latest('id')->first();

        $number = $last
            ? ((int) substr($last->kode_simpanan, 3)) + 1
            : 1;

        $data['kode_simpanan'] = 'SIM' . str_pad(
            $number,
            6,
            '0',
            STR_PAD_LEFT
        );

        return $data;
    }
}
