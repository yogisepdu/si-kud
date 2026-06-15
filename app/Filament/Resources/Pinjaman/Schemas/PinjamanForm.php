<?php

namespace App\Filament\Resources\Pinjaman\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;
use Illuminate\Support\HtmlString;

class PinjamanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Data Pinjaman')
                    ->schema([

                        Grid::make(3)
                            ->schema([

                                TextInput::make('jumlah_pinjaman')
                                    ->label('Jumlah Pinjaman')
                                    ->prefix('Rp')
                                    ->required()
                                    ->extraInputAttributes([
                                        'x-mask:dynamic' => '$money($input)',
                                    ])
                                    ->dehydrateStateUsing(
                                        fn($state) => preg_replace('/[^0-9]/', '', $state)
                                    )
                                    ->live(),

                                TextInput::make('jangka_waktu')
                                    ->label('Jangka Waktu')
                                    ->numeric()
                                    ->suffix('Bulan')
                                    ->required()
                                    ->live(),

                                TextInput::make('persentase_bunga')
                                    ->label('Bunga')
                                    ->numeric()
                                    ->suffix('%')
                                    ->default(12)
                                    ->disabled()
                                    ->dehydrated()
                                    ->live(),

                            ]),

                        Placeholder::make('simulasi')
                            ->label('')
                            ->content(function ($get) {

                                $pinjaman = (float) preg_replace(
                                    '/[^0-9]/',
                                    '',
                                    $get('jumlah_pinjaman') ?? '0'
                                );

                                $bunga = (float) ($get('persentase_bunga') ?? 0);
                                $tenor = (int) ($get('jangka_waktu') ?? 1);

                                if ($pinjaman <= 0) {
                                    return new HtmlString('');
                                }

                                $totalBunga = $pinjaman * ($bunga / 100);
                                $totalPinjaman = $pinjaman + $totalBunga;
                                $angsuran = $totalPinjaman / max($tenor, 1);

                                return new HtmlString("
                            <div class='rounded-xl border p-4 bg-gray-50 dark:bg-gray-900'>
                                <div class='text-lg font-bold mb-4'>
                                    Simulasi Pinjaman
                                </div>

                                <div class='grid grid-cols-3 gap-4'>

                                    <div>
                                        <div class='text-sm text-gray-500'>
                                            Total Bunga
                                        </div>

                                        <div class='font-semibold'>
                                            Rp " . number_format($totalBunga, 0, ',', '.') . "
                                        </div>
                                    </div>

                                    <div>
                                        <div class='text-sm text-gray-500'>
                                            Total Pinjaman
                                        </div>

                                        <div class='font-semibold'>
                                            Rp " . number_format($totalPinjaman, 0, ',', '.') . "
                                        </div>
                                    </div>

                                    <div>
                                        <div class='text-sm text-gray-500'>
                                            Angsuran / Bulan
                                        </div>

                                        <div class='text-xl font-bold text-success-600'>
                                            Rp " . number_format($angsuran, 0, ',', '.') . "
                                        </div>
                                    </div>

                                </div>
                            </div>
                        ");
                            })
                            ->columnSpanFull(),

                        Textarea::make('tujuan_pinjaman')
                            ->label('Tujuan Pinjaman')
                            ->rows(4)
                            ->required(),

                    ]),

                Section::make('Data Pengajuan')
                    ->schema([

                        TextInput::make('no_hp')
                            ->label('Nomor HP')
                            ->tel()
                            ->default(
                                fn() => auth()->user()?->anggota?->no_hp
                            )
                            ->disabled()
                            ->dehydrated()
                            ->required(),

                        TextInput::make('email')
                            ->email()
                            ->default(
                                fn() => auth()->user()?->email
                            )
                            ->disabled()
                            ->dehydrated()
                            ->required(),

                        Textarea::make('jaminan')
                            ->label('Agunan / Jaminan')
                            ->rows(4)
                            ->required()
                            ->columnSpanFull(),

                    ])
                    ->columns(2),

                Section::make('Dokumen Persyaratan')
                    ->description('Upload seluruh dokumen dalam format PDF (maksimal 2 MB per file)')
                    ->schema([

                        FileUpload::make('file_ktp')
                            ->label('KTP')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('pinjaman/ktp')
                            ->disk('public')
                            ->maxSize(2048)
                            ->downloadable()
                            ->openable()
                            ->helperText('Format PDF, maksimal 2 MB')
                            ->required()
                            ->preserveFilenames(false),

                        FileUpload::make('file_kk')
                            ->label('Kartu Keluarga')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('pinjaman/kk')
                            ->disk('public')
                            ->maxSize(2048)
                            ->downloadable()
                            ->openable()
                            ->helperText('Format PDF, maksimal 2 MB')
                            ->required()
                            ->preserveFilenames(false),

                        FileUpload::make('file_bukti_penghasilan')
                            ->label('Bukti Penghasilan')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('pinjaman/penghasilan')
                            ->disk('public')
                            ->maxSize(2048)
                            ->downloadable()
                            ->openable()
                            ->helperText('Format PDF, maksimal 2 MB')
                            ->required()
                            ->preserveFilenames(false),

                        FileUpload::make('file_agunan')
                            ->label('Dokumen Agunan')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('pinjaman/agunan')
                            ->disk('public')
                            ->maxSize(2048)
                            ->downloadable()
                            ->openable()
                            ->helperText('Format PDF, maksimal 2 MB')
                            ->required()
                            ->preserveFilenames(false),

                        FileUpload::make('file_dokumen_pendukung')
                            ->label('Dokumen Pendukung Lain')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('pinjaman/pendukung')
                            ->disk('public')
                            ->maxSize(2048)
                            ->downloadable()
                            ->openable()
                            ->helperText('Format PDF, maksimal 2 MB')
                            ->preserveFilenames(false),

                    ])
                    ->columns(2),

            ]);
    }
}
