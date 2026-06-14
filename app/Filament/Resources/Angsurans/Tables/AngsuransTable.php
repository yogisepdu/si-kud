<?php

namespace App\Filament\Resources\Angsurans\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AngsuransTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('jatuh_tempo')
            ->columns([

                TextColumn::make('pinjaman.kode_pinjaman')
                    ->label('Kode Pinjaman')
                    ->searchable(),

                TextColumn::make('pinjaman.anggota.user.name')
                    ->label('Anggota')
                    ->searchable(),

                TextColumn::make('angsuran_ke')
                    ->label('Angsuran ke-')
                    ->alignCenter()
                    ->sortable(),

                TextColumn::make('jatuh_tempo')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('nominal')
                    ->label('Jumlah Angsuran')
                    ->money('IDR')
                    ->weight('semibold')
                    ->sortable(),

                TextColumn::make('tanggal_bayar')
                    ->label('Tanggal Bayar')
                    ->date('d M Y')
                    ->placeholder('-'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()

                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'belum_bayar' => 'Belum Bayar',
                        'menunggu_verifikasi' => 'Menunggu Verifikasi',
                        'dibayar' => 'Lunas',
                        'ditolak' => 'Ditolak',
                        default => '-',
                    })

                    ->color(fn(string $state): string => match ($state) {
                        'dibayar' => 'success',
                        'belum_bayar' => 'warning',
                        'menunggu_verifikasi' => 'info',
                        'ditolak' => 'danger',
                        default => 'gray',
                    })

                    ->icon(fn(string $state): string => match ($state) {
                        'dibayar' => 'heroicon-m-check-circle',
                        'belum_bayar' => 'heroicon-m-exclamation-circle',
                        'menunggu_verifikasi' => 'heroicon-m-clock',
                        'ditolak' => 'heroicon-m-x-circle',
                        default => 'heroicon-m-minus-circle',
                    }),

            ])
            ->filters([
                //
                SelectFilter::make('status')
                    ->options([
                        'belum_bayar' => 'Belum Bayar',
                        'menunggu_verifikasi' => 'Menunggu Verifikasi',
                        'dibayar' => 'Dibayar',
                        'ditolak' => 'Ditolak',
                    ]),
            ])
            ->recordActions([
                Action::make('detail')
                    ->label('Detail')
                    ->icon('heroicon-o-eye')
                    ->color('gray'),
                Action::make('bayar')
                    ->label('Bayar')
                    ->icon('heroicon-o-banknotes')
                    ->color('success')

                    ->visible(
                        fn($record) =>
                        in_array($record->status, [
                            'belum_bayar',
                            'ditolak',
                        ])
                    )

                    ->form([

                        DatePicker::make('tanggal_bayar')
                            ->label('Tanggal Bayar')
                            ->required()
                            ->default(now()),

                        FileUpload::make('bukti_bayar')
                            ->label('Bukti Pembayaran')
                            ->directory('angsuran')
                            ->disk('public')
                            ->required()
                            ->downloadable()
                            ->openable(),

                    ])

                    ->action(function (array $data, $record) {

                        $record->update([
                            'tanggal_bayar' => $data['tanggal_bayar'],
                            'bukti_bayar' => $data['bukti_bayar'],
                            'status' => 'menunggu_verifikasi',
                        ]);
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([]),
            ]);
    }
}
