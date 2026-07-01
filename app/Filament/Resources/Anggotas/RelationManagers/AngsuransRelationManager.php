<?php

namespace App\Filament\Resources\Anggotas\RelationManagers;

use App\Filament\Support\AngsuranTableActions;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AngsuransRelationManager extends RelationManager
{
    use AngsuranTableActions;

    protected static string $relationship = 'angsurans';

    protected static ?string $title = 'Data Angsuran';

    public function table(Table $table): Table
    {
        return $table
            ->defaultSort('jatuh_tempo')

            ->columns([

                Tables\Columns\TextColumn::make('pinjaman.kode_pinjaman')
                    ->label('Kode Pinjaman')
                    ->searchable(),

                Tables\Columns\TextColumn::make('angsuran_ke')
                    ->label('Angsuran Ke')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('jatuh_tempo')
                    ->label('Jatuh Tempo')
                    ->date('d M Y'),

                Tables\Columns\TextColumn::make('nominal')
                    ->label('Nominal')
                    ->money('IDR'),

                Tables\Columns\TextColumn::make('tanggal_bayar')
                    ->label('Tanggal Bayar')
                    ->date('d M Y')
                    ->placeholder('-'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()

                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'belum_bayar' => 'Belum Bayar',
                        'menunggu_verifikasi' => 'Menunggu Verifikasi',
                        'dibayar' => 'Lunas',
                        'ditolak' => 'Ditolak',
                        default => '-',
                    })

                    ->color(fn(string $state): string => match ($state) {
                        'dibayar' => 'success',
                        'belum_bayar' => 'warning',
                        'menunggu_verifikasi' => 'info',
                        'ditolak' => 'danger',
                        default => 'gray',
                    })

                    ->icon(fn(string $state): string => match ($state) {
                        'dibayar' => 'heroicon-m-check-circle',
                        'belum_bayar' => 'heroicon-m-exclamation-circle',
                        'menunggu_verifikasi' => 'heroicon-m-clock',
                        'ditolak' => 'heroicon-m-x-circle',
                        default => 'heroicon-m-minus-circle',
                    }),
                TextColumn::make('alasan_penolakan')
                    ->label('Alasan Penolakan')
                    ->wrap()
                    ->placeholder('-')
                    ->toggleable()
                    ->formatStateUsing(function ($state, $record) {

                        if (! in_array($record->status, ['dibayar', 'ditolak'])) {
                            return '-';
                        }

                        return $state ?: '-';
                    })
                    ->color(fn($record) => match ($record->status) {
                        'dibayar' => 'success',
                        'ditolak' => 'danger',
                        default => 'gray',
                    }),

            ])

            ->recordActions([

                ...static::getAngsuranActions(),

            ]);
    }
}
