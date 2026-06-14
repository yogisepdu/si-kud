<?php

namespace App\Filament\Resources\Angsurans\Pages;

use App\Filament\Resources\Angsurans\AngsuranResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAngsuran extends ViewRecord
{
    protected static string $resource = AngsuranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
