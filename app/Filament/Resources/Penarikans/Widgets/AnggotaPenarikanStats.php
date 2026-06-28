<?php

namespace App\Filament\Resources\Penarikans\Widgets;

use App\Models\Anggota;
use App\Models\Penarikan;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AnggotaPenarikanStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $user = auth()->user();

        $anggota = Anggota::where('user_id', $user->id)->first();

        if (! $anggota) {
            return [];
        }

        $query = $anggota->penarikans();

        $totalPengajuan = (clone $query)->count();

        $totalDicairkan = (clone $query)
            ->where('status', 'disetujui')
            ->sum('jumlah_penarikan');

        $pending = (clone $query)
            ->where('status', 'pending')
            ->count();

        return [

            Stat::make(
                'Total Pengajuan Saya',
                number_format($totalPengajuan)
            )
                ->description('Seluruh riwayat pengajuan penarikan')
                ->descriptionIcon('heroicon-m-document-text', IconPosition::Before)
                ->icon('heroicon-o-document-duplicate')
                ->color('primary')
                ->chart([4, 5, 7, 6, 8, 9, 10]),

            Stat::make(
                'Dana Berhasil Dicairkan',
                'Rp ' . number_format($totalDicairkan, 0, ',', '.')
            )
                ->description('Total dana yang telah berhasil dicairkan')
                ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before)
                ->icon('heroicon-o-banknotes')
                ->color('success')
                ->chart([3, 5, 7, 8, 10, 12, 15]),

            Stat::make(
                'Sedang Diproses',
                number_format($pending)
            )
                ->description('Pengajuan masih menunggu persetujuan pimpinan')
                ->descriptionIcon('heroicon-m-clock', IconPosition::Before)
                ->icon('heroicon-o-clock')
                ->color('warning')
                ->chart([7, 6, 5, 4, 5, 4, 3]),

            Stat::make(
                'Saldo Simpanan Sukarela',
                'Rp ' . number_format($anggota->saldo_sukarela, 0, ',', '.')
            )
                ->description('Saldo yang masih dapat diajukan untuk penarikan')
                ->descriptionIcon('heroicon-m-wallet', IconPosition::Before)
                ->icon('heroicon-o-wallet')
                ->color('info')
                ->chart([8, 10, 11, 13, 12, 14, 15]),

        ];
    }
}
