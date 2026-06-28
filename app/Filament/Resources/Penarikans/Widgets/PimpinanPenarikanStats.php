<?php

namespace App\Filament\Resources\Penarikans\Widgets;

use App\Models\Penarikan;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PimpinanPenarikanStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $pending = Penarikan::where('status', 'pending');

        $jumlahPending = (clone $pending)->count();

        $nominalPending = (clone $pending)
            ->sum('jumlah_penarikan');

        $disetujuiBulanIni = Penarikan::where('status', 'disetujui')
            ->whereMonth('tanggal_penarikan', now()->month)
            ->whereYear('tanggal_penarikan', now()->year)
            ->count();

        $ditolak = Penarikan::where('status', 'ditolak')
            ->count();

        return [

            Stat::make(
                'Menunggu Persetujuan',
                number_format($jumlahPending)
            )
                ->description('Pengajuan yang perlu segera ditinjau')
                ->descriptionIcon('heroicon-m-clock', IconPosition::Before)
                ->icon('heroicon-o-clock')
                ->color('warning')
                ->chart([10, 9, 8, 7, 6, 5, 4]),

            Stat::make(
                'Nominal Menunggu',
                'Rp ' . number_format($nominalPending, 0, ',', '.')
            )
                ->description('Total dana yang menunggu persetujuan')
                ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before)
                ->icon('heroicon-o-banknotes')
                ->color('info')
                ->chart([3, 5, 7, 9, 10, 12, 15]),

            Stat::make(
                'Disetujui Bulan Ini',
                number_format($disetujuiBulanIni)
            )
                ->description('Pengajuan berhasil disetujui bulan ini')
                ->descriptionIcon('heroicon-m-check-circle', IconPosition::Before)
                ->icon('heroicon-o-check-badge')
                ->color('success')
                ->chart([2, 4, 5, 7, 8, 10, 12]),

            Stat::make(
                'Pengajuan Ditolak',
                number_format($ditolak)
            )
                ->description('Pengajuan yang tidak memenuhi persyaratan')
                ->descriptionIcon('heroicon-m-x-circle', IconPosition::Before)
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->chart([2, 2, 1, 2, 1, 1, 0]),

        ];
    }
}
