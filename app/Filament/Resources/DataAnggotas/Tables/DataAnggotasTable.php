<?php

namespace App\Filament\Resources\DataAnggotas\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DataAnggotasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('no_anggota')
            ->columns([

                TextColumn::make('id')
                    ->label('No')
                    ->rowIndex(),

                TextColumn::make('no_anggota')
                    ->label('No. Anggota')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold'),

                TextColumn::make('user.name')
                    ->label('Nama Anggota')
                    ->searchable()
                    ->sortable()
                    ->weight('semiBold'),

                TextColumn::make('nik')
                    ->label('NIK')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('tempat_lahir')
                    ->label('Tempat Lahir')
                    ->toggleable(),

                TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->date('d F Y')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'Laki-laki' => 'info',
                        'Perempuan' => 'warning',
                        default => 'gray',
                    }),

                TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(40)
                    ->tooltip(fn($record) => $record->alamat)
                    ->toggleable(),

                TextColumn::make('no_hp')
                    ->label('No. HP')
                    ->copyable(),

                TextColumn::make('jenis_petani')
                    ->label('Jenis Petani')
                    ->badge()
                    ->color('warning'),

                TextColumn::make('blok_kebun')
                    ->label('Blok Kebun')
                    ->badge()
                    ->color('success'),

                TextColumn::make('luas_lahan')
                    ->label('Luas Lahan')
                    ->formatStateUsing(fn($state) => number_format($state, 2) . ' Ha')
                    ->sortable(),

                TextColumn::make('tanggal_bergabung')
                    ->label('Bergabung')
                    ->date('d F Y')
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->icon(fn(string $state) => match ($state) {
                        'aktif' => 'heroicon-o-check-circle',
                        'nonaktif' => 'heroicon-o-x-circle',
                        default => 'heroicon-o-question-mark-circle',
                    })
                    ->color(fn(string $state) => match ($state) {
                        'aktif' => 'success',
                        'nonaktif' => 'danger',
                        default => 'gray',
                    }),

            ])
            ->filters([
                //
            ])
            ->recordActions([]);
    }
}
