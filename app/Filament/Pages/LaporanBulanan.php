<?php

namespace App\Filament\Pages;

use App\Services\LaporanBulananService;
use Filament\Actions\Action;
use Filament\Pages\Page;

class LaporanBulanan extends Page
{
    /**
     * View halaman
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
     * Data laporan
     */
    public function getLaporan()
    {
        return app(LaporanBulananService::class)
            ->getData(
                bulan: $this->bulan,
                tahun: $this->tahun,
            );
    }

    /**
     * Total Simpanan
     */
    public function getTotalSimpanan(): float
    {
        return $this->getLaporan()->sum('total_simpanan');
    }

    /**
     * Total Pinjaman
     */
    public function getTotalPinjaman(): float
    {
        return $this->getLaporan()->sum('total_pinjaman');
    }

    /**
     * Total Angsuran
     */
    public function getTotalAngsuran(): float
    {
        return $this->getLaporan()->sum('total_angsuran');
    }

    /**
     * Grand Total
     */
    public function getGrandTotal(): float
    {
        return
            $this->getTotalSimpanan()
            +
            $this->getTotalPinjaman()
            +
            $this->getTotalAngsuran();
    }

    /**
     * Header Action
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