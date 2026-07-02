<?php

namespace App\Filament\Widgets;

use App\Models\Simpanan;
use Filament\Facades\Filament;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RiwayatSimpanan extends TableWidget
{
    protected static ?string $heading = 'Riwayat Simpanan Saya';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 6;

    public function table(Table $table): Table
    {
        $anggota = Filament::auth()->user()->anggota;

        return $table
            ->query(
                $anggota
                    ? Simpanan::query()
                    ->where('anggota_id', $anggota->id)
                    ->withSum('items', 'jumlah')
                    ->latest('tanggal')
                    : Simpanan::query()->whereRaw('1 = 0')
            )
            ->columns([
                Tables\Columns\TextColumn::make('kode_simpanan')
                    ->label('Kode Simpanan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->limit(30)
                    ->searchable(),

                Tables\Columns\TextColumn::make('items_sum_jumlah')
                    ->label('Nominal')
                    ->money('IDR', locale: 'id')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'menunggu',
                        'success' => 'terverifikasi',
                        'danger' => 'ditolak',
                    ]),

                Tables\Columns\IconColumn::make('slip_pdf')
                    ->label('Slip')
                    ->icon(fn($state) => filled($state)
                        ? 'heroicon-o-document-arrow-down'
                        : 'heroicon-o-minus')
                    ->url(fn(Simpanan $record) => $record->slip_pdf
                        ? asset('storage/' . $record->slip_pdf)
                        : null)
                    ->openUrlInNewTab(),
            ])
            ->defaultSort('tanggal', 'desc')
            ->paginated([5, 10, 25]);
    }
}
