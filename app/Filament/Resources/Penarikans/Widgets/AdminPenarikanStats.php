<?php

namespace App\Filament\Resources\Penarikans\Widgets;

use App\Models\Penarikan;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminPenarikanStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalPengajuan = Penarikan::count();

        $pending = Penarikan::where('status', 'pending')->count();

        $nominal = Penarikan::where('status', 'disetujui')
            ->sum('jumlah_penarikan');

        $hariIni = Penarikan::whereDate('created_at', today())->count();

        return [

            Stat::make('Total Pengajuan', number_format($totalPengajuan))
                ->description('Seluruh pengajuan penarikan')
                ->descriptionIcon('heroicon-m-document-text', IconPosition::Before)
                ->icon('heroicon-o-clipboard-document-list')
                ->color('primary')
                ->chart([8, 12, 10, 15, 14, 18, 20]),

            Stat::make('Menunggu Verifikasi', number_format($pending))
                ->description('Belum diverifikasi pimpinan')
                ->descriptionIcon('heroicon-m-clock', IconPosition::Before)
                ->icon('heroicon-o-clock')
                ->color('warning')
                ->chart([7, 6, 8, 9, 7, 5, 4]),

            Stat::make(
                'Total Nominal',
                'Rp ' . number_format($nominal, 0, ',', '.')
            )
                ->description('Total dana telah dicairkan')
                ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before)
                ->icon('heroicon-o-banknotes')
                ->color('success')
                ->chart([5, 8, 9, 10, 12, 14, 18]),

            Stat::make('Pengajuan Hari Ini', number_format($hariIni))
                ->description('Pengajuan yang masuk hari ini')
                ->descriptionIcon('heroicon-m-calendar-days', IconPosition::Before)
                ->icon('heroicon-o-calendar-days')
                ->color('info')
                ->chart([1, 2, 1, 3, 4, 2, 5]),

        ];
    }
}
