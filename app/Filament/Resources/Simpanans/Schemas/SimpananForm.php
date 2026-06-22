<?php

namespace App\Filament\Resources\Simpanans\Schemas;

use App\Models\Anggota;
use App\Models\Simpanan;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Repeater;
use Filament\Support\RawJs;

class SimpananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Select::make('anggota_id')
                    ->label('Anggota')
                    ->options(
                        Anggota::with('user')
                            ->get()
                            ->pluck('user.name', 'id')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Hidden::make('kode_simpanan')
                    ->dehydrated(true)
                    ->default(function () {

                        $last = Simpanan::latest('id')->first();

                        $number = $last
                            ? ((int) substr($last->kode_simpanan, 3)) + 1
                            : 1;

                        return 'SIM' . str_pad(
                            $number,
                            6,
                            '0',
                            STR_PAD_LEFT
                        );
                    }),

                DatePicker::make('tanggal')
                    ->required()
                    ->default(now()),

                Repeater::make('items')
                    ->relationship()
                    ->schema([
                        Select::make('jenis')
                            ->options([
                                'pokok' => 'Simpanan Pokok',
                                'wajib' => 'Simpanan Wajib',
                                'sukarela' => 'Simpanan Sukarela',
                                'berjangka' => 'Simpanan Berjangka',
                                'pendidikan' => 'Simpanan Pendidikan',
                            ])
                            ->required(),

                        TextInput::make('jumlah')
                            ->label('Jumlah Setoran')
                            ->prefix('Rp')
                            ->required()
                            ->numeric()
                            ->helperText('Masukkan nominal setoran simpanan'),
                    ])
                    ->columns(2)
                    ->label('Detail Simpanan')
                    ->columnSpanFull(),

                Textarea::make('keterangan')
                    ->columnSpanFull(),

            ])
            ->columns(2);
    }
}
