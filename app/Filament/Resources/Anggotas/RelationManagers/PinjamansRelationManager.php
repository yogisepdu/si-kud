<?php

namespace App\Filament\Resources\Anggotas\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class PinjamansRelationManager extends RelationManager
{
    protected static string $relationship = 'pinjamans';

    protected static ?string $title = 'Data Pinjaman';

    public function table(Table $table): Table
    {
        return $table
            ->defaultSort('tanggal_pengajuan', 'desc')

            ->columns([

                Tables\Columns\TextColumn::make('kode_pinjaman')
                    ->label('Kode Pinjaman')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jumlah_pinjaman')
                    ->label('Jumlah Pinjaman')
                    ->money('IDR'),

                Tables\Columns\TextColumn::make('jangka_waktu')
                    ->label('Tenor'),

                Tables\Columns\TextColumn::make('angsuran_per_bulan')
                    ->label('Angsuran/Bulan')
                    ->money('IDR'),

                Tables\Columns\TextColumn::make('status')
                    ->badge(),

            ]);
    }
}
