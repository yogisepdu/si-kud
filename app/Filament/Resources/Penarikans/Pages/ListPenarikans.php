<?php

namespace App\Filament\Resources\Penarikans\Pages;

use App\Filament\Resources\Penarikans\PenarikanResource;
use App\Filament\Resources\Penarikans\Widgets\AdminPenarikanStats;
use App\Filament\Resources\Penarikans\Widgets\AnggotaPenarikanStats;
use App\Filament\Resources\Penarikans\Widgets\PimpinanPenarikanStats;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPenarikans extends ListRecords
{
    protected static string $resource = PenarikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(fn() => auth()->user()->role === 'administrator'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        $user = auth()->user();

        return match ($user->role) {
            'administrator' => [
                AdminPenarikanStats::class,
            ],

            'pimpinan' => [
                PimpinanPenarikanStats::class,
            ],

            'anggota' => [
                AnggotaPenarikanStats::class,
            ],

            default => [],
        };
    }
}
