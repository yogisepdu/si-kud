<?php

namespace App\Filament\Widgets;

use App\Models\Angsuran;
use App\Models\Pinjaman;
use Filament\Facades\Filament;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewAnggota extends StatsOverviewWidget
{

    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        $anggota = Filament::auth()->user()->anggota;

        if (! $anggota) {
            return [];
        }

        $totalSaldo = $anggota->total_saldo;

        $totalPinjaman = $anggota->pinjamans()->sum('total_pinjaman');

        $totalAngsuran = $anggota->angsurans()
            ->where('angsurans.status', 'terverifikasi')
            ->sum('nominal');

        $sisaPinjaman = max(0, $totalPinjaman - $totalAngsuran);

        return [

            Stat::make(
                'Saldo Simpanan',
                'Rp ' . number_format($totalSaldo, 0, ',', '.')
            )
                ->description('Total saldo simpanan')
                ->descriptionIcon(Heroicon::OutlinedWallet)
                ->color('success')
                ->chart([5, 8, 10, 12, 15, 18, 20]),

            Stat::make(
                'Total Pinjaman',
                'Rp ' . number_format($totalPinjaman, 0, ',', '.')
            )
                ->description('Akumulasi pinjaman')
                ->descriptionIcon(Heroicon::OutlinedBanknotes)
                ->color('warning')
                ->chart([2, 4, 5, 7, 8, 9, 10]),

            Stat::make(
                'Sisa Pinjaman',
                'Rp ' . number_format($sisaPinjaman, 0, ',', '.')
            )
                ->description('Belum lunas')
                ->descriptionIcon(Heroicon::OutlinedExclamationCircle)
                ->color('danger')
                ->chart([10, 9, 8, 7, 6, 5, 4]),

            Stat::make(
                'Angsuran Dibayar',
                'Rp ' . number_format($totalAngsuran, 0, ',', '.')
            )
                ->description('Total angsuran terverifikasi')
                ->descriptionIcon(Heroicon::OutlinedCheckCircle)
                ->color('primary')
                ->chart([1, 3, 5, 7, 9, 11, 13]),

        ];
    }
}
