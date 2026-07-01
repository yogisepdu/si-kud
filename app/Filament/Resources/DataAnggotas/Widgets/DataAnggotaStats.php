<?php

namespace App\Filament\Resources\DataAnggotas\Widgets;

use App\Models\Anggota;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DataAnggotaStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $total = Anggota::count();

        $aktif = Anggota::where('status', 'aktif')->count();

        $nonaktif = Anggota::where('status', 'nonaktif')->count();

        $jenisTerbanyak = Anggota::selectRaw('jenis_petani, COUNT(*) as total')
            ->groupBy('jenis_petani')
            ->orderByDesc('total')
            ->first();

        return [

            Stat::make('Total Anggota', number_format($total))
                ->description('Seluruh anggota koperasi')
                ->descriptionIcon('heroicon-m-users')
                ->icon('heroicon-o-users')
                ->color('primary'),

            Stat::make('Anggota Aktif', number_format($aktif))
                ->description('Masih aktif')
                ->descriptionIcon('heroicon-m-check-circle')
                ->icon('heroicon-o-user-group')
                ->color('success'),

            Stat::make('Nonaktif', number_format($nonaktif))
                ->description('Tidak aktif')
                ->descriptionIcon('heroicon-m-x-circle')
                ->icon('heroicon-o-user-minus')
                ->color('danger'),

            Stat::make(
                'Jenis Petani',
                $jenisTerbanyak?->jenis_petani ?? '-'
            )
                ->description(
                    ($jenisTerbanyak->total ?? 0) . ' anggota'
                )
                ->descriptionIcon('heroicon-m-chart-bar')
                ->icon('heroicon-o-chart-bar-square')
                ->color('warning'),

        ];
    }
}
