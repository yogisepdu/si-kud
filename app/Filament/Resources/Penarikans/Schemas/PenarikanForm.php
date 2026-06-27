<?php

namespace App\Filament\Resources\Penarikans\Schemas;

use App\Models\Anggota;
use App\Models\Penarikan;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PenarikanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Data Anggota')
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
                            ->live()
                            ->disabled(
                                fn(?Penarikan $record) =>
                                $record !== null &&
                                    $record->status !== 'pending'
                            ),

                        Placeholder::make('saldo_pokok')
                            ->label('Saldo Simpanan Pokok')
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
                            ->label('Saldo Simpanan Wajib')
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
                            ->label('Saldo Simpanan Sukarela')
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

                Section::make('Data Penarikan')
                    ->icon('heroicon-o-banknotes')
                    ->schema([

                        DatePicker::make('tanggal_penarikan')
                            ->label('Tanggal Penarikan')
                            ->default(now())
                            ->native(false)
                            ->required()
                            ->maxDate(now())
                            ->disabled(
                                fn(?Penarikan $record) =>
                                $record !== null &&
                                    $record->status !== 'pending'
                            ),

                        TextInput::make('jumlah_penarikan')
                            ->label('Jumlah Penarikan')
                            ->numeric()
                            ->prefix('Rp')
                            ->minValue(1000)
                            ->step(1000)
                            ->required()
                            ->live()
                            ->disabled(
                                fn(?Penarikan $record) =>
                                $record !== null &&
                                    $record->status !== 'pending'
                            )
                            ->rule(function ($get) {
                                return function (
                                    string $attribute,
                                    $value,
                                    \Closure $fail
                                ) use ($get) {

                                    $anggota = Anggota::find($get('anggota_id'));

                                    if (! $anggota) {
                                        return;
                                    }

                                    if ($value > $anggota->saldo_sukarela) {
                                        $fail('Jumlah penarikan melebihi saldo simpanan sukarela anggota.');
                                    }
                                };
                            }),

                        Textarea::make('keterangan')
                            ->label('Keterangan')
                            ->placeholder(
                                'Contoh: Keperluan pribadi, biaya pendidikan, kebutuhan usaha, dan lain-lain.'
                            )
                            ->rows(3)
                            ->required()
                            ->columnSpanFull()
                            ->disabled(
                                fn(?Penarikan $record) =>
                                $record !== null &&
                                    $record->status !== 'pending'
                            ),

                    ])
                    ->columns(2),
                Section::make('Informasi Verifikasi')
                    ->icon('heroicon-o-shield-check')
                    ->visible(fn(?Penarikan $record) => $record !== null)
                    ->schema([

                        Placeholder::make('status_info')
                            ->label('Status')
                            ->content(function (?Penarikan $record) {

                                if (! $record) {
                                    return '-';
                                }

                                return match ($record->status) {
                                    'pending' => '🟡 Menunggu Persetujuan',
                                    'disetujui' => '🟢 Disetujui',
                                    'ditolak' => '🔴 Ditolak',
                                    default => '-',
                                };
                            }),

                        Placeholder::make('verified_by_info')
                            ->label('Diverifikasi Oleh')
                            ->content(
                                fn(?Penarikan $record) =>
                                $record?->verifier?->name ?? '-'
                            ),

                        Placeholder::make('verified_at_info')
                            ->label('Tanggal Verifikasi')
                            ->content(
                                fn(?Penarikan $record) =>
                                $record?->verified_at?->format('d M Y H:i') ?? '-'
                            ),

                    ])
                    ->columns(3),

            ]);
    }
}
