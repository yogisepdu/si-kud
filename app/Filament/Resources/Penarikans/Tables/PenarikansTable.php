<?php

namespace App\Filament\Resources\Penarikans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PenarikansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('tanggal_penarikan', 'desc')
            ->columns([

                TextColumn::make('kode_penarikan')
                    ->label('Kode Penarikan')
                    ->searchable()
                    ->sortable()
                    ->copyable(),

                TextColumn::make('tanggal_penarikan')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('anggota.no_anggota')
                    ->label('No. Anggota')
                    ->searchable(),

                TextColumn::make('anggota.user.name')
                    ->label('Nama Anggota')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jumlah_penarikan')
                    ->label('Jumlah Penarikan')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Petugas')
                    ->badge(),

                TextColumn::make('keterangan')
                    ->limit(40)
                    ->tooltip(fn($record) => $record->keterangan),

                TextColumn::make('created_at')
                    ->label('Diinput')
                    ->since()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
