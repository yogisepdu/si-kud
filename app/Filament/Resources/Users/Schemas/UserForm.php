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

                /*
                |--------------------------------------------------------------------------
                | Nama
                |--------------------------------------------------------------------------
                */
                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->validationMessages([
                        'required' => 'Nama wajib diisi.',
                    ]),

                /*
                |--------------------------------------------------------------------------
                | Email
                |--------------------------------------------------------------------------
                */
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'required' => 'Email wajib diisi.',
                        'email' => 'Format email tidak valid. Contoh: nama@email.com',
                        'unique' => 'Email tersebut sudah terdaftar. Silakan gunakan email lain.',
                    ]),

                /*
                |--------------------------------------------------------------------------
                | Hak Akses
                |--------------------------------------------------------------------------
                */
                Select::make('role')
                    ->label('Hak Akses')
                    ->options([
                        'administrator' => 'Administrator',
                        'pimpinan' => 'Pimpinan',
                        'anggota' => 'Anggota',
                    ])
                    ->required()
                    ->live()
                    ->validationMessages([
                        'required' => 'Hak akses wajib dipilih.',
                    ]),

                /*
                |--------------------------------------------------------------------------
                | Password
                |--------------------------------------------------------------------------
                */
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
                    )
                    ->minLength(8)
                    ->validationMessages([
                        'required' => 'Password wajib diisi.',
                        'min_length' => 'Password minimal harus 8 karakter.',
                    ])
                    ->helperText(
                        fn(string $operation): ?string =>
                        $operation === 'create'
                            ? 'Password minimal 8 karakter.'
                            : 'Kosongkan jika tidak ingin mengubah password.'
                    ),

                /*
                |--------------------------------------------------------------------------
                | Data Anggota
                |--------------------------------------------------------------------------
                */
                Section::make('Data Anggota')
                    ->schema([

                        TextInput::make('anggota.no_anggota')
                            ->label('No Anggota')
                            ->required()
                            ->validationMessages([
                                'required' => 'No Anggota wajib diisi.',
                            ]),

                        TextInput::make('anggota.nik')
                            ->label('NIK')
                            ->required()
                            ->numeric()
                            ->validationMessages([
                                'numeric' => 'NIK hanya boleh berisi angka.',
                                'required' => 'NIK wajib diisi.',
                            ]),

                        TextInput::make('anggota.tempat_lahir')
                            ->label('Tempat Lahir')
                            ->required()
                            ->validationMessages([
                                'required' => 'Tempat Lahir wajib diisi.',
                            ]),

                        DatePicker::make('anggota.tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->required()
                            ->validationMessages([
                                'required' => 'Tanggal Lahir wajib diisi.',
                            ]),

                        Select::make('anggota.jenis_kelamin')
                            ->label('Jenis Kelamin')
                            ->required()
                            ->options([
                                'Laki-laki' => 'Laki-laki',
                                'Perempuan' => 'Perempuan',
                            ])
                            ->validationMessages([
                                'required' => 'Jenis Kelamin wajib diisi.',
                            ]),

                        TextInput::make('anggota.no_hp')
                            ->label('No HP')
                            ->tel()
                            ->required()
                            ->validationMessages([
                                'required' => 'No HP wajib diisi.',
                                'tel' => 'No HP harus berupa nomor telepon yang valid.',
                            ]),

                        Select::make('anggota.jenis_petani')
                            ->label('Jenis Petani')
                            ->required()
                            ->options([
                                'Plasma' => 'Plasma',
                                'Swadaya' => 'Swadaya',
                            ])
                            ->validationMessages([
                                'required' => 'Jenis Petani wajib diisi.',
                            ]),

                        TextInput::make('anggota.luas_lahan')
                            ->label('Luas Lahan')
                            ->numeric()
                            ->required()
                            ->suffix('Ha')
                            ->validationMessages([
                                'numeric' => 'Luas lahan harus berupa angka.',
                                'required' => 'Luas lahan wajib diisi.',
                            ]),

                        TextInput::make('anggota.blok_kebun')
                            ->label('Blok Kebun')
                            ->required()
                            ->validationMessages([
                                'required' => 'Blok Kebun wajib diisi.',
                            ]),

                        DatePicker::make('anggota.tanggal_bergabung')
                            ->label('Tanggal Bergabung')
                            ->default(now())
                            ->required()
                            ->validationMessages([
                                'required' => 'Tanggal Bergabung wajib diisi.',
                            ]),

                        Select::make('anggota.status')
                            ->label('Status')
                            ->options([
                                'Aktif' => 'Aktif',
                                'Tidak Aktif' => 'Tidak Aktif',
                            ])
                            ->default('Aktif')
                            ->required()
                            ->validationMessages([
                                'required' => 'Status wajib diisi.',
                            ]),

                        Textarea::make('anggota.alamat')
                            ->label('Alamat')
                            ->columnSpanFull()
                            ->required()
                            ->validationMessages([
                                'required' => 'Alamat wajib diisi.',
                            ]),

                    ])
                    ->columns(2)
                    ->columnSpanFull()

                    /*
                    |--------------------------------------------------------------------------
                    | Section hanya muncul ketika role = anggota
                    |--------------------------------------------------------------------------
                    */
                    ->visible(
                        fn($get) => $get('role') === 'anggota'
                    ),

            ]);
    }
}
