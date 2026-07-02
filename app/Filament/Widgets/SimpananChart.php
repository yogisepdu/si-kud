<?php

namespace App\Filament\Widgets;

use App\Models\SimpananItem;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class SimpananChart extends ChartWidget
{
    protected ?string $heading = 'Komposisi Simpanan';

    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        $data = SimpananItem::query()
            ->select('jenis', DB::raw('SUM(jumlah) as total'))
            ->groupBy('jenis')
            ->orderBy('jenis')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Simpanan',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => [
                        '#22c55e',
                        '#3b82f6',
                        '#f59e0b',
                        '#ef4444',
                        '#8b5cf6',
                        '#06b6d4',
                        '#84cc16',
                        '#f97316',
                    ],
                    'borderWidth' => 1,
                ],
            ],

            'labels' => $data->pluck('jenis')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
