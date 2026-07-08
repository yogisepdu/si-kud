<?php

namespace App\Filament\Resources\KritikSarans\Pages;

use App\Filament\Resources\KritikSarans\KritikSaranResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKritikSaran extends EditRecord
{
    protected static string $resource = KritikSaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
