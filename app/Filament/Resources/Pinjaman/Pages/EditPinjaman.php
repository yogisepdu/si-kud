<?php

namespace App\Filament\Resources\Pinjaman\Pages;

use App\Filament\Resources\Pinjaman\PinjamanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPinjaman extends EditRecord
{
    protected static string $resource = PinjamanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
