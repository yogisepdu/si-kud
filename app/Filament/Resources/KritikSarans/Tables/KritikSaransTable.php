<?php

namespace App\Filament\Resources\KritikSarans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;

class KritikSaransTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                 TextColumn::make('nama')
                ->searchable()
                ->sortable(),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('judul')
                    ->limit(35)
                    ->searchable(),

                IconColumn::make('dibaca')
                    ->boolean()
                    ->label('Sudah Dibaca'),

                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at','desc')
            ->filters([
                //
                 Filter::make('belum_dibaca')
                    ->query(fn ($query) => $query->where('dibaca',false))
            ])
            ->recordActions([
                // ViewAction::make(),
                // DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
