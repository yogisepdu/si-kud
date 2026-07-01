<?php

namespace App\Filament\Resources\DataAnggotas\Pages;

use App\Filament\Resources\DataAnggotas\DataAnggotaResource;
use App\Filament\Resources\DataAnggotas\Widgets\DataAnggotaStats;
use App\Filament\Resources\DataAnggotas\Widgets\PertumbuhanAnggotaChart;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataAnggotas extends ListRecords
{
    protected static string $resource = DataAnggotaResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            DataAnggotaStats::class,
            PertumbuhanAnggotaChart::class,
        ];
    }
}
