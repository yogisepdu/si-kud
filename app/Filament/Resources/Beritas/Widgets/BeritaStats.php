<?php

namespace App\Filament\Resources\Beritas\Widgets;

use App\Models\Berita;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BeritaStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make('Total Berita', Berita::count())
                ->description('Semua berita')
                ->descriptionIcon(Heroicon::OutlinedDocumentText)
                ->color('warning')
                ->chart([5, 7, 6, 8, 10, 12, 15])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),

            Stat::make(
                'Published',
                Berita::where('is_publish', true)->count()
            )
                ->description('Berita tayang')
                ->descriptionIcon(Heroicon::OutlinedCheckCircle)
                ->color('success')
                ->chart([3, 4, 5, 7, 8, 10, 12]),

            Stat::make(
                'Draft',
                Berita::where('is_publish', false)->count()
            )
                ->description('Belum tayang')
                ->descriptionIcon(Heroicon::OutlinedPencilSquare)
                ->color('warning')
                ->chart([6, 5, 4, 4, 3, 2, 1]),

            Stat::make(
                'Bulan Ini',
                Berita::whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year)
                    ->count()
            )
                ->description('Dibuat bulan ini')
                ->descriptionIcon(Heroicon::OutlinedCalendarDays)
                ->color('primary')
                ->chart([0, 1, 1, 2, 3, 4, 5]),

        ];
    }
}
