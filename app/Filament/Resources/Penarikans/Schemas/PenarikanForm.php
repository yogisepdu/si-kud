<?php

namespace App\Filament\Resources\Penarikans\Schemas;

use App\Models\Anggota;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class PenarikanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                ComponentsSection::make('Data Anggota')
                    ->icon('heroicon-o-user')
                    ->schema([

                        Select::make('anggota_id')
                            ->label('Anggota')
                            ->relationship('anggota', 'id')
                            ->getOptionLabelFromRecordUsing(
                                fn(Anggota $record): string =>
                                "{$record->no_anggota} - {$record->nama}"
                            )
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live(),

                        Placeholder::make('saldo_pokok')
                            ->label('Saldo Pokok')
                            ->content(function ($get) {

                                $anggota = Anggota::find($get('anggota_id'));

                                if (! $anggota) {
                                    return '-';
                                }

                                return 'Rp ' . number_format(
                                    $anggota->saldo_pokok,
                                    0,
                                    ',',
                                    '.'
                                );
                            }),

                        Placeholder::make('saldo_wajib')
                            ->label('Saldo Wajib')
                            ->content(function ($get) {

                                $anggota = Anggota::find($get('anggota_id'));

                                if (! $anggota) {
                                    return '-';
                                }

                                return 'Rp ' . number_format(
                                    $anggota->saldo_wajib,
                                    0,
                                    ',',
                                    '.'
                                );
                            }),

                        Placeholder::make('saldo_sukarela')
                            ->label('Saldo Sukarela')
                            ->content(function ($get) {

                                $anggota = Anggota::find($get('anggota_id'));

                                if (! $anggota) {
                                    return '-';
                                }

                                return 'Rp ' . number_format(
                                    $anggota->saldo_sukarela,
                                    0,
                                    ',',
                                    '.'
                                );
                            }),

                    ])
                    ->columns(4),

                ComponentsSection::make('Data Penarikan')
                    ->icon('heroicon-o-banknotes')
                    ->schema([

                        DatePicker::make('tanggal_penarikan')
                            ->label('Tanggal Penarikan')
                            ->default(now())
                            ->native(false)
                            ->required(),

                        TextInput::make('jumlah_penarikan')
                            ->label('Jumlah Penarikan')
                            ->numeric()
                            ->prefix('Rp')
                            ->required()
                            ->minValue(1000)
                            ->live(),

                        Textarea::make('keterangan')
                            ->label('Keterangan')
                            ->placeholder('Contoh: Keperluan pribadi, biaya pendidikan, kebutuhan usaha, dll')
                            ->rows(3)
                            ->columnSpanFull(),

                    ])
                    ->columns(2),

            ]);
    }
}
