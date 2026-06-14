<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->label('Nama')
                    ->required(),

                TextInput::make('email')
                    ->email()
                    ->required(),

                Select::make('role')
                    ->label('Hak Akses')
                    ->options([
                        'administrator' => 'Administrator',
                        'pimpinan' => 'Pimpinan',
                        'anggota' => 'Anggota',
                    ])
                    ->required()
                    ->live(),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->revealable()
                    ->dehydrateStateUsing(
                        fn($state) => filled($state)
                            ? Hash::make($state)
                            : null
                    )
                    ->dehydrated(
                        fn($state) => filled($state)
                    )
                    ->required(
                        fn(string $operation): bool =>
                        $operation === 'create'
                    ),

                Section::make('Data Anggota')
                    ->schema([

                        TextInput::make('anggota.no_anggota')
                            ->label('No Anggota')
                            ->required(),

                        TextInput::make('anggota.nik')
                            ->label('NIK')
                            ->numeric(),

                        TextInput::make('anggota.tempat_lahir')
                            ->label('Tempat Lahir'),

                        DatePicker::make('anggota.tanggal_lahir')
                            ->label('Tanggal Lahir'),

                        Select::make('anggota.jenis_kelamin')
                            ->options([
                                'Laki-laki' => 'Laki-laki',
                                'Perempuan' => 'Perempuan',
                            ]),

                        TextInput::make('anggota.no_hp')
                            ->label('No HP'),

                        Select::make('anggota.jenis_petani')
                            ->options([
                                'Plasma' => 'Plasma',
                                'Swadaya' => 'Swadaya',
                            ]),

                        TextInput::make('anggota.luas_lahan')
                            ->numeric()
                            ->suffix('Ha'),

                        TextInput::make('anggota.blok_kebun')
                            ->label('Blok Kebun'),

                        DatePicker::make('anggota.tanggal_bergabung')
                            ->default(now()),

                        Select::make('anggota.status')
                            ->options([
                                'Aktif' => 'Aktif',
                                'Tidak Aktif' => 'Tidak Aktif',
                            ])
                            ->default('Aktif'),

                        Textarea::make('anggota.alamat')
                            ->columnSpanFull(),

                    ])
                    ->columns(2)
                    ->columnSpanFull()
                    ->visible(fn($get) => $get('role') === 'anggota'),
            ]);
    }
}
