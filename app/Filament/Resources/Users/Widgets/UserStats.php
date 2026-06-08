<?php

namespace App\Filament\Resources\Users\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Akun', User::count())
                ->description('Seluruh pengguna sistem')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),

            Stat::make(
                'Administrator',
                User::where('role', User::ADMINISTRATOR)->count()
            )
                ->description('Hak akses penuh')
                ->descriptionIcon('heroicon-m-shield-check')
                ->color('danger'),

            Stat::make(
                'Pimpinan',
                User::where('role', User::PIMPINAN)->count()
            )
                ->description('Akses operasional')
                ->descriptionIcon('heroicon-m-user-circle')
                ->color('success'),

            Stat::make(
                'Anggota',
                User::where('role', User::ANGGOTA)->count()
            )
                ->description('Pengguna anggota')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('warning'),
        ];
    }
}