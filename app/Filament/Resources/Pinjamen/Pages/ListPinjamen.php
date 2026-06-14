<?php

namespace App\Filament\Resources\Pinjamen\Pages;

use App\Filament\Resources\Pinjamen\PinjamanResource;
use App\Filament\Resources\Pinjamen\Widgets\PinjamanStats;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPinjamen extends ListRecords
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
