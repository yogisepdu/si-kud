<?php

namespace App\Filament\Widgets;

use App\Models\Pinjaman;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PinjamanChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Pinjaman per Bulan';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = Pinjaman::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->whereYear('created_at', now()->year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $labels = [];
        $values = [];

        $namaBulan = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'Mei',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Ags',
            9 => 'Sep',
            10 => 'Okt',
            11 => 'Nov',
            12 => 'Des',
        ];

        foreach ($data as $item) {
            $labels[] = $namaBulan[$item->bulan];
            $values[] = $item->total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pinjaman',
                    'data' => $values,
                    'borderColor' => '#16a34a',
                    'backgroundColor' => 'rgba(22,163,74,.15)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],

            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
