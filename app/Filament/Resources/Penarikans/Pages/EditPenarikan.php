<?php

namespace App\Filament\Resources\Penarikans\Pages;

use App\Filament\Resources\Penarikans\PenarikanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPenarikan extends EditRecord
{
    protected static string $resource = PenarikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
