<?php

namespace App\Filament\Resources\Users\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class UserRoleChart extends ChartWidget
{
    protected ?string $heading = 'Distribusi Hak Akses Pengguna';

    protected static ?int $sort = 2;

    protected ?string $description =
    'Perbandingan jumlah Administrator, Pimpinan, dan Anggota';

    protected int|string|array $columnSpan = '1/2';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah User',

                    'data' => [
                        User::where('role', User::ADMINISTRATOR)->count(),
                        User::where('role', User::PIMPINAN)->count(),
                        User::where('role', User::ANGGOTA)->count(),
                    ],

                    'backgroundColor' => [
                        '#ef4444', // Administrator
                        '#22c55e', // Pimpinan
                        '#f59e0b', // Anggota
                    ],

                    'borderColor' => [
                        '#ef4444',
                        '#22c55e',
                        '#f59e0b',
                    ],

                    'borderWidth' => 1,
                ],
            ],

            'labels' => [
                'Administrator',
                'Pimpinan',
                'Anggota',
            ],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}