<?php

namespace App\Filament\Resources\Angsurans\Pages;

use App\Filament\Resources\Angsurans\AngsuranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAngsurans extends ListRecords
{
    protected static string $resource = AngsuranResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
