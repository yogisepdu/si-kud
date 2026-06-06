<?php

namespace App\Filament\Resources\Produks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProduksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('type')
                    ->label('Jenis Layanan')
                    ->badge()
                    ->formatStateUsing(fn($state) => match ($state) {
                        'pupuk' => 'Layanan Pupuk',
                        'tbs' => 'Layanan TBS',
                        'simpan_pinjam' => 'Simpan Pinjam',
                    }),

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),

                IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
