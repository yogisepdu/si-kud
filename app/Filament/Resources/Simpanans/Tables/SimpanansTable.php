<?php

namespace App\Filament\Resources\Simpanans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SimpanansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('kode_simpanan')
                    ->searchable(),

                TextColumn::make('anggota.user.name')
                    ->label('Nama Anggota')
                    ->searchable(),

                TextColumn::make('jenis')
                    ->badge()
                    ->formatStateUsing(fn($state) => match ($state) {
                        'pokok' => 'Simpanan Pokok',
                        'wajib' => 'Simpanan Wajib',
                        'sukarela' => 'Simpanan Sukarela',
                        'berjangka' => 'Simpanan Berjangka',
                        'pendidikan' => 'Simpanan Pendidikan',
                        default => $state,
                    })
                    ->color(fn($state) => match ($state) {
                        'pokok' => 'success',
                        'wajib' => 'info',
                        'sukarela' => 'warning',
                        'berjangka' => 'primary',
                        'pendidikan' => 'purple',
                        default => 'gray',
                    }),

                TextColumn::make('jumlah')
                    ->money('IDR'),

                TextColumn::make('tanggal')
                    ->date('d M Y'),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'approved' => 'success',
                        'pending' => 'warning',
                        'rejected' => 'danger',
                        default => 'gray',
                    }),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
