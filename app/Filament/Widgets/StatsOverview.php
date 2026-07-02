<?php

namespace App\Filament\Widgets;

use App\Models\Anggota;
use App\Models\Pinjaman;
use App\Models\SimpananItem;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalSimpanan = SimpananItem::sum('jumlah');

        return [
            Stat::make('Total Anggota', Anggota::count())
                ->description('Anggota terdaftar')
                ->descriptionIcon(Heroicon::OutlinedUsers)
                ->color('success')
                ->chart([5, 7, 8, 10, 12, 14, 15]),

            Stat::make('Total Pinjaman', Pinjaman::count())
                ->description('Data pinjaman')
                ->descriptionIcon(Heroicon::OutlinedBanknotes)
                ->color('warning')
                ->chart([2, 4, 6, 5, 8, 10, 12]),

            Stat::make(
                'Total Simpanan',
                'Rp ' . number_format($totalSimpanan, 0, ',', '.')
            )
                ->description('Akumulasi seluruh simpanan')
                ->descriptionIcon(Heroicon::OutlinedCurrencyDollar)
                ->color('primary')
                ->chart([10, 15, 18, 20, 22, 25, 30]),

            Stat::make(
                'Pengajuan Pinjaman',
                Pinjaman::where('status', 'Menunggu')->count()
            )
                ->description('Menunggu persetujuan')
                ->descriptionIcon(Heroicon::OutlinedClock)
                ->color('danger')
                ->chart([1, 3, 2, 5, 4, 6, 7]),
        ];
    }
}
