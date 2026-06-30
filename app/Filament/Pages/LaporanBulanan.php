<?php

namespace App\Filament\Pages;

use App\Services\LaporanBulananService;
use Filament\Actions\Action;
use Filament\Pages\Page;

class LaporanBulanan extends Page
{
    /**
     * View
     */
    protected string $view = 'filament.pages.laporan-bulanan';

    /**
     * Navigation
     */
    protected static ?string $navigationLabel = 'Laporan Bulanan';

    protected static string|\UnitEnum|null $navigationGroup = 'Laporan';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 1;

    /**
     * Filter
     */
    public int $bulan;

    public int $tahun;

    /**
     * Mount
     */
    public function mount(): void
    {
        $this->bulan = now()->month;
        $this->tahun = now()->year;
    }

    /**
     * Service
     */
    protected function service(): LaporanBulananService
    {
        return app(LaporanBulananService::class);
    }

    /**
     * Data tabel
     */
    public function getLaporan()
    {
        return $this->service()->getData(
            $this->bulan,
            $this->tahun,
        );
    }

    /**
     * Ringkasan
     */
    public function getSummary(): array
    {
        $rows = $this->getLaporan();

        return [

            'simpanan' => $rows->sum('total_simpanan'),

            'pinjaman' => $rows->sum('total_pinjaman'),

            'angsuran' => $rows->sum('total_angsuran'),

            'sisa' => $rows->sum('sisa_pinjaman'),

            'anggota' => $rows->count(),

        ];
    }

    /**
     * Export PDF
     */
    protected function getHeaderActions(): array
    {
        return [

            Action::make('pdf')

                ->label('Export PDF')

                ->icon('heroicon-o-printer')

                ->color('danger')

                ->url(fn () => route(
                    'laporan.bulanan.pdf',
                    [
                        'bulan' => $this->bulan,
                        'tahun' => $this->tahun,
                    ]
                ))

                ->openUrlInNewTab(),

        ];
    }
}