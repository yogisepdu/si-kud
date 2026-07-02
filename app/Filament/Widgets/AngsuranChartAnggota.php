<?php

namespace App\Filament\Widgets;

use App\Models\Angsuran;
use Filament\Facades\Filament;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class AngsuranChartAnggota extends ChartWidget
{
    protected ?string $heading = 'Grafik Angsuran Saya';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        $anggota = Filament::auth()->user()->anggota;

        if (! $anggota) {
            return [
                'datasets' => [
                    [
                        'label' => 'Angsuran',
                        'data' => [],
                    ],
                ],
                'labels' => [],
            ];
        }

        $data = Angsuran::query()
            ->select(
                DB::raw('MONTH(tanggal_bayar) as bulan'),
                DB::raw('SUM(nominal) as total')
            )
            ->whereHas('pinjaman', function ($query) use ($anggota) {
                $query->where('anggota_id', $anggota->id);
            })
            ->whereNotNull('tanggal_bayar')
            ->whereYear('tanggal_bayar', now()->year)
            ->groupBy(DB::raw('MONTH(tanggal_bayar)'))
            ->orderBy(DB::raw('MONTH(tanggal_bayar)'))
            ->get();

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

        return [
            'datasets' => [
                [
                    'label' => 'Total Angsuran',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => [
                        '#16a34a',
                        '#22c55e',
                        '#84cc16',
                        '#facc15',
                        '#fb923c',
                        '#ef4444',
                        '#8b5cf6',
                        '#3b82f6',
                        '#06b6d4',
                        '#14b8a6',
                        '#10b981',
                        '#65a30d',
                    ],
                ],
            ],

            'labels' => $data
                ->pluck('bulan')
                ->map(fn($bulan) => $namaBulan[$bulan] ?? $bulan)
                ->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
