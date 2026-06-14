<?php

namespace App\Filament\Resources\Angsurans\Pages;

use App\Filament\Resources\Angsurans\AngsuranResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAngsuran extends EditRecord
{
    protected static string $resource = AngsuranResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
