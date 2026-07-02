<?php

namespace App\Filament\Widgets;

use App\Models\SimpananItem;
use Filament\Facades\Filament;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class SimpananChartAnggota extends ChartWidget
{
    protected ?string $heading = 'Komposisi Simpanan Saya';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        $anggota = Filament::auth()->user()->anggota;

        if (! $anggota) {
            return [
                'datasets' => [
                    [
                        'data' => [],
                    ],
                ],
                'labels' => [],
            ];
        }

        $data = SimpananItem::query()
            ->select('jenis', DB::raw('SUM(jumlah) as total'))
            ->whereHas('simpanan', function ($query) use ($anggota) {
                $query
                    ->where('anggota_id', $anggota->id)
                    ->where('status', 'terverifikasi');
            })
            ->groupBy('jenis')
            ->orderBy('jenis')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Simpanan',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => [
                        '#16a34a',
                        '#2563eb',
                        '#f59e0b',
                        '#dc2626',
                        '#7c3aed',
                        '#0891b2',
                    ],
                    'borderWidth' => 1,
                ],
            ],

            'labels' => $data
                ->pluck('jenis')
                ->map(fn($jenis) => ucfirst($jenis))
                ->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
