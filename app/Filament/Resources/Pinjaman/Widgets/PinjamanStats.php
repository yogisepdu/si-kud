<?php

namespace App\Filament\Resources\Pinjaman\Widgets;

use App\Models\Anggota;
use App\Models\Angsuran;
use App\Models\Pinjaman;
use App\Models\Simpanan;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

$totalSimpanan = \App\Models\SimpananItem::sum('jumlah');

class PinjamanStats extends StatsOverviewWidget
{
    protected int|string|array $columnSpan = 'full';

    protected function getStats(): array
    {
        $user = auth()->user();

        if (! $user) {
            return [];
        }

        /**
         * ==================================================
         * ROLE ANGGOTA
         * ==================================================
         */
        if ($user->isAnggota()) {

            $anggota = $user->anggota;

            if (! $anggota) {
                return [];
            }

            $totalPinjaman = $anggota->pinjamans()
                ->where('status', 'disetujui')
                ->sum('jumlah_pinjaman');

            $pinjamanAktif = $anggota->pinjamans()
                ->where('status', 'disetujui')
                ->where('status', '!=', 'lunas')
                ->count();

            $angsuranBulanIni = $anggota->pinjamans()
                ->where('status', 'disetujui')
                ->sum('angsuran_per_bulan');

            $sisaPinjaman = $anggota->pinjamans()
                ->where('status', 'disetujui')
                ->sum('total_pinjaman');

            return [
                Stat::make(
                    'Total Pinjaman Saya',
                    'Rp ' . number_format($totalPinjaman, 0, ',', '.')
                )
                    ->description('Total pinjaman disetujui')
                    ->descriptionIcon('heroicon-m-banknotes')
                    ->icon('heroicon-m-currency-dollar')
                    ->color('success'),

                Stat::make(
                    'Pinjaman Aktif',
                    $pinjamanAktif
                )
                    ->description('Pinjaman yang masih berjalan')
                    ->descriptionIcon('heroicon-m-arrow-trending-up')
                    ->icon('heroicon-m-document-currency-dollar')
                    ->color('info'),

                Stat::make(
                    'Angsuran Bulan Ini',
                    'Rp ' . number_format($angsuranBulanIni, 0, ',', '.')
                )
                    ->description('Estimasi angsuran bulanan')
                    ->descriptionIcon('heroicon-m-calendar-days')
                    ->icon('heroicon-m-wallet')
                    ->color('warning'),

                Stat::make(
                    'Sisa Pinjaman',
                    'Rp ' . number_format($sisaPinjaman, 0, ',', '.')
                )
                    ->description('Total kewajiban pinjaman')
                    ->descriptionIcon('heroicon-m-exclamation-circle')
                    ->icon('heroicon-m-scale')
                    ->color('danger'),
            ];
        }

        /**
         * ==================================================
         * ROLE PIMPINAN
         * ==================================================
         */
        if ($user->isPimpinan()) {

            return [
                Stat::make(
                    'Pengajuan Menunggu',
                    Pinjaman::whereIn('status', [
                        'menunggu',
                        'disetujui',
                        'ditolak',
                        'lunas',
                    ])->count()
                )
                    ->description('Menunggu persetujuan')
                    ->descriptionIcon('heroicon-m-clock')
                    ->icon('heroicon-m-inbox')
                    ->color('warning'),

                Stat::make(
                    'Pinjaman Disetujui',
                    Pinjaman::where('status', 'disetujui')->count()
                )
                    ->description('Telah disetujui')
                    ->descriptionIcon('heroicon-m-check-circle')
                    ->icon('heroicon-m-check-badge')
                    ->color('success'),

                Stat::make(
                    'Pinjaman Ditolak',
                    Pinjaman::where('status', 'ditolak')->count()
                )
                    ->description('Pengajuan ditolak')
                    ->descriptionIcon('heroicon-m-x-circle')
                    ->icon('heroicon-m-no-symbol')
                    ->color('danger'),

                Stat::make(
                    'Total Nilai Pinjaman',
                    'Rp ' . number_format(
                        Pinjaman::where('status', 'disetujui')
                            ->sum('jumlah_pinjaman'),
                        0,
                        ',',
                        '.'
                    )
                )
                    ->description('Total pinjaman aktif')
                    ->descriptionIcon('heroicon-m-chart-bar')
                    ->icon('heroicon-m-banknotes')
                    ->color('info'),
            ];
        }

        /**
         * ==================================================
         * ROLE ADMINISTRATOR
         * ==================================================
         */
        if ($user->isAdmin()) {

            return [
                Stat::make(
                    'Jumlah Anggota',
                    Anggota::count()
                )
                    ->description('Anggota terdaftar')
                    ->descriptionIcon('heroicon-m-user-group')
                    ->icon('heroicon-m-users')
                    ->color('success'),

                Stat::make(
                    'Jumlah Pinjaman',
                    Pinjaman::whereNot('status', 'draft')
                        ->count()
                )
                    ->description('Seluruh data pinjaman')
                    ->descriptionIcon('heroicon-m-document-text')
                    ->icon('heroicon-m-document-currency-dollar')
                    ->color('info'),

                Stat::make(
                    'Total Simpanan',
                    'Rp ' . number_format(
                        Simpanan::with('items')
                            ->get()
                            ->sum(fn($s) => $s->items->sum('jumlah')),
                        0,
                        ',',
                        '.'
                    )
                )
                    ->description('Akumulasi simpanan')
                    ->descriptionIcon('heroicon-m-arrow-down-tray')
                    ->icon('heroicon-m-building-library')
                    ->color('warning'),

                Stat::make(
                    'Total Angsuran',
                    'Rp ' . number_format(
                        Angsuran::sum('nominal'),
                        0,
                        ',',
                        '.'
                    )
                )
                    ->description('Akumulasi pembayaran')
                    ->descriptionIcon('heroicon-m-arrow-up-tray')
                    ->icon('heroicon-m-credit-card')
                    ->color('danger'),
            ];
        }

        return [];
    }

    protected function getColumns(): int
    {
        return 4;
    }
}
