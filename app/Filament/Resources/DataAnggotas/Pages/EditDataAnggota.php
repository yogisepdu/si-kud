<?php

namespace App\Filament\Resources\DataAnggotas\Pages;

use App\Filament\Resources\DataAnggotas\DataAnggotaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataAnggota extends EditRecord
{
    protected static string $resource = DataAnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
