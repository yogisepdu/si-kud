<?php

namespace App\Filament\Resources\KritikSarans\Pages;

use App\Filament\Resources\KritikSarans\KritikSaranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKritikSarans extends ListRecords
{
    protected static string $resource = KritikSaranResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
