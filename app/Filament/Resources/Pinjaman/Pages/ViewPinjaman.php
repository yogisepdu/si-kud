<?php

namespace App\Filament\Resources\Pinjaman\Pages;

use App\Filament\Resources\Pinjaman\PinjamanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPinjaman extends ViewRecord
{
    protected static string $resource = PinjamanResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
