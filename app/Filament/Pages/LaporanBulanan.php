<?php

namespace App\Filament\Pages;

use App\Services\LaporanBulananService;
use Filament\Actions\Action;
use Filament\Pages\Page;
use Filament\Facades\Filament;

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
     * Ringkasan laporan
     */
    public function getSummary(): array
    {
        $laporan = $this->getLaporan();

        return [
            'anggota' => $laporan->count(),
            'simpanan' => $laporan->sum('total_simpanan'),
            'pinjaman' => $laporan->sum('total_pinjaman'),
            'angsuran' => $laporan->sum('total_angsuran'),
            'sisa' => $laporan->sum('sisa_pinjaman'),
        ];
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

    public static function shouldRegisterNavigation(): bool
    {
        return Filament::auth()->user()?->role !== 'anggota';
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->role !== 'anggota';
    }

    /**
     * Header Action
     */
    protected function getHeaderActions(): array
    {
        return [

            Action::make('exportPdf')
                ->label('Export PDF')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('danger')
                ->size('lg')
                ->tooltip('Download laporan bulanan')
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