<?php

namespace App\Filament\Widgets;

use App\Models\Angsuran;
use Filament\Facades\Filament;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RiwayatAngsuran extends TableWidget
{
    protected static ?string $heading = 'Riwayat Angsuran Saya';

    protected static ?int $sort = 5;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        $anggota = Filament::auth()->user()->anggota;

        if (! $anggota) {
            return $table
                ->query(
                    Angsuran::query()->whereRaw('1 = 0')
                );
        }

        return $table
            ->query(
                Angsuran::query()
                    ->whereHas('pinjaman', function (Builder $query) use ($anggota) {
                        $query->where('anggota_id', $anggota->id);
                    })
                    ->latest('tanggal_bayar')
            )
            ->columns([
                Tables\Columns\TextColumn::make('pinjaman.kode_pinjaman')
                    ->label('Kode Pinjaman')
                    ->searchable(),

                Tables\Columns\TextColumn::make('angsuran_ke')
                    ->label('Angsuran Ke')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('nominal')
                    ->label('Nominal')
                    ->money('IDR', locale: 'id'),

                Tables\Columns\TextColumn::make('jatuh_tempo')
                    ->label('Jatuh Tempo')
                    ->date('d M Y'),

                Tables\Columns\TextColumn::make('tanggal_bayar')
                    ->label('Tanggal Bayar')
                    ->date('d M Y')
                    ->placeholder('-'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'menunggu',
                        'success' => 'terverifikasi',
                        'danger' => 'ditolak',
                    ]),
            ])
            ->defaultSort('jatuh_tempo', 'desc')
            ->paginated([5, 10, 25]);
    }
}
