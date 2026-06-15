<?php

namespace App\Filament\Resources\Pinjaman\Pages;

use App\Filament\Resources\Pinjaman\PinjamanResource;
use App\Filament\Resources\Pinjaman\Widgets\PinjamanStats;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPinjaman extends ListRecords
{
    protected static string $resource = PinjamanResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [];

        if (auth()->user()?->isAnggota()) {
            $actions[] = CreateAction::make();
        }

        return $actions;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PinjamanStats::class,
        ];
    }
}
