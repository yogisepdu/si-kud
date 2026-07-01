<?php

namespace App\Filament\Resources\DataAnggotas\Widgets;

use App\Models\Anggota;
use Filament\Widgets\ChartWidget;

class PertumbuhanAnggotaChart extends ChartWidget
{
    protected ?string $heading = 'Pertumbuhan Anggota Tahun Ini';

    protected int|string|array $columnSpan = [
        'default' => 2,
        'lg' => 2,
    ];

    protected function getData(): array
    {
        $data = [];

        foreach (range(1, 12) as $bulan) {
            $data[] = Anggota::whereYear('tanggal_bergabung', now()->year)
                ->whereMonth('tanggal_bergabung', $bulan)
                ->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Anggota',
                    'data' => $data,
                    'fill' => true,
                    'tension' => .4,
                ],
            ],

            'labels' => [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agu',
                'Sep',
                'Okt',
                'Nov',
                'Des',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
