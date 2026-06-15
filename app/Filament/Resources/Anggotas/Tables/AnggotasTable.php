<?php

namespace App\Filament\Resources\Anggotas\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use App\Filament\Resources\Anggotas\AnggotaResource;

class AnggotasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')

            ->columns([

                TextColumn::make('no_anggota')
                    ->label('No. Anggota')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Nama Anggota')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nik')
                    ->label('NIK')
                    ->searchable(),

                TextColumn::make('jenis_petani')
                    ->label('Jenis Petani')
                    ->badge(),

                TextColumn::make('blok_kebun')
                    ->label('Blok Kebun'),

                TextColumn::make('luas_lahan')
                    ->label('Luas Lahan')
                    ->suffix(' Ha'),

                TextColumn::make('no_hp')
                    ->label('No. HP'),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'aktif' => 'success',
                        'nonaktif' => 'danger',
                        default => 'gray',
                    }),
            ])

            ->filters([
                //
            ])

            ->recordActions([

                Action::make('detail')
                    ->label('Detail')
                    ->icon('heroicon-o-eye')
                    ->url(
                        fn($record) => AnggotaResource::getUrl('view', [
                            'record' => $record,
                        ])
                    ),
            ]);
    }
}
