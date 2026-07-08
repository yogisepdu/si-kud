<?php

namespace App\Filament\Resources\KritikSarans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class KritikSaransTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('judul')
                    ->label('Judul')
                    ->placeholder('-')
                    ->limit(35)
                    ->searchable(),

                TextColumn::make('pesan')
                    ->label('Pesan')
                    ->limit(50)
                    ->searchable(),

                IconColumn::make('dibaca')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-clock')
                    ->trueColor('success')
                    ->falseColor('warning'),

                TextColumn::make('dibalas_pada')
                    ->label('Dibalas Pada')
                    ->dateTime('d M Y H:i')
                    ->placeholder('Belum dibalas')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Tanggal Masuk')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('belum_dibaca')
                    ->label('Belum Dibaca')
                    ->query(fn(Builder $query): Builder => $query->where('dibaca', false)),

                Filter::make('sudah_dibaca')
                    ->label('Sudah Dibaca')
                    ->query(fn(Builder $query): Builder => $query->where('dibaca', true)),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Lihat')
                    ->icon('heroicon-o-eye'),

                DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus Terpilih'),
                ]),
            ]);
    }
}
