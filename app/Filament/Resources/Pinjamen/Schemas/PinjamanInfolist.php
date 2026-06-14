<?php

namespace App\Filament\Resources\Pinjamen\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\ViewEntry;

class PinjamanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Ringkasan Pengajuan Pinjaman')
                    ->description('Informasi utama pengajuan pinjaman anggota')
                    ->icon('heroicon-o-banknotes')
                    ->compact()
                    ->schema([

                        Grid::make([
                            'default' => 1,
                            'md' => 2,
                            'xl' => 4,
                        ])
                            ->schema([

                                TextEntry::make('jumlah_pinjaman')
                                    ->label('Jumlah Pinjaman')
                                    ->money('IDR'),

                                TextEntry::make('total_bunga')
                                    ->label('Total Bunga')
                                    ->money('IDR'),

                                TextEntry::make('total_pinjaman')
                                    ->label('Total Tagihan')
                                    ->money('IDR'),

                                TextEntry::make('angsuran_per_bulan')
                                    ->label('Angsuran / Bulan')
                                    ->money('IDR'),

                            ]),

                        Grid::make([
                            'default' => 1,
                            'md' => 2,
                            'xl' => 4,
                        ])
                            ->schema([

                                TextEntry::make('kode_pinjaman')
                                    ->label('Nomor Pinjaman')
                                    ->weight('bold'),

                                TextEntry::make('tanggal_pengajuan')
                                    ->label('Tanggal Pengajuan')
                                    ->date('d F Y'),

                                TextEntry::make('persentase_bunga')
                                    ->label('Bunga')
                                    ->suffix('%'),

                                TextEntry::make('status')
                                    ->label('Status')
                                    ->badge()
                                    ->formatStateUsing(
                                        fn(string $state) => match ($state) {
                                            'draft' => 'Draft',
                                            'menunggu' => 'Menunggu Persetujuan',
                                            'disetujui' => 'Disetujui',
                                            'ditolak' => 'Ditolak',
                                            'lunas' => 'Lunas',
                                            default => $state,
                                        }
                                    )
                                    ->color(
                                        fn(string $state) => match ($state) {
                                            'draft' => 'gray',
                                            'menunggu' => 'warning',
                                            'disetujui' => 'success',
                                            'ditolak' => 'danger',
                                            'lunas' => 'info',
                                            default => 'gray',
                                        }
                                    ),

                            ]),

                    ]),

                Section::make('Data Anggota')
                    ->icon('heroicon-o-user')
                    ->description('Data anggota yang mengajukan pinjaman')
                    ->schema([

                        Grid::make([
                            'default' => 1,
                            'md' => 2,
                            'xl' => 3,
                        ])
                            ->schema([

                                TextEntry::make('anggota.user.name')
                                    ->label('Nama Anggota'),

                                TextEntry::make('anggota.no_anggota')
                                    ->label('Nomor Anggota'),

                                TextEntry::make('anggota.nik')
                                    ->label('NIK'),

                                TextEntry::make('anggota.no_hp')
                                    ->label('Nomor HP'),

                                TextEntry::make('anggota.user.email')
                                    ->label('Email'),

                                TextEntry::make('anggota.jenis_petani')
                                    ->label('Jenis Petani'),

                            ]),

                    ]),

                Grid::make(2)
                    ->schema([

                        Section::make('Tujuan Pinjaman')
                            ->icon('heroicon-o-document-text')
                            ->schema([

                                TextEntry::make('tujuan_pinjaman')
                                    ->label(''),

                            ]),

                        Section::make('Agunan / Jaminan')
                            ->icon('heroicon-o-shield-check')
                            ->schema([

                                TextEntry::make('jaminan')
                                    ->label(''),

                            ]),

                    ])
                    ->columnSpanFull(),

                Section::make('Dokumen Persyaratan')
                    ->icon('heroicon-o-folder')
                    ->description('Preview dokumen pengajuan pinjaman')
                    ->schema([

                        Section::make('KTP')
                            ->schema([
                                ViewEntry::make('file_ktp')
                                    ->label('')
                                    ->view('pinjaman.pdf-preview'),
                            ]),

                        Section::make('Kartu Keluarga')
                            ->schema([
                                ViewEntry::make('file_kk')
                                    ->label('')
                                    ->view('pinjaman.pdf-preview'),
                            ]),

                        Section::make('Bukti Penghasilan')
                            ->schema([
                                ViewEntry::make('file_bukti_penghasilan')
                                    ->label('')
                                    ->view('pinjaman.pdf-preview'),
                            ]),

                        Section::make('Dokumen Agunan')
                            ->schema([
                                ViewEntry::make('file_agunan')
                                    ->label('')
                                    ->view('pinjaman.pdf-preview'),
                            ]),

                        Section::make('Dokumen Pendukung')
                            ->visible(
                                fn($record) => filled($record->file_dokumen_pendukung)
                            )
                            ->schema([
                                ViewEntry::make('file_dokumen_pendukung')
                                    ->label('')
                                    ->view('pinjaman.pdf-preview'),
                            ]),

                    ])
                    ->columnSpanFull(),

                Section::make('Informasi Verifikasi')
                    ->icon('heroicon-o-check-badge')
                    ->schema([

                        Grid::make(3)
                            ->schema([

                                TextEntry::make('approver.name')
                                    ->label('Disetujui Oleh')
                                    ->placeholder('-'),

                                TextEntry::make('approved_at')
                                    ->label('Tanggal Verifikasi')
                                    ->dateTime('d M Y H:i')
                                    ->placeholder('-'),

                                TextEntry::make('status')
                                    ->label('Status Akhir')
                                    ->badge(),

                            ]),

                        TextEntry::make('catatan_pimpinan')
                            ->label('Catatan Pimpinan')
                            ->placeholder('Tidak ada catatan'),

                    ])
                    ->visible(
                        fn($record) =>
                        in_array($record->status, [
                            'disetujui',
                            'ditolak',
                        ])
                    ),

            ]);
    }
}
