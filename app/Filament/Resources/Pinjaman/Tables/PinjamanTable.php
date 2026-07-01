<?php

namespace App\Filament\Resources\Pinjaman\Tables;

use Filament\Actions\Action as ActionsAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class PinjamanTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordUrl(null)
            ->columns([

                TextColumn::make('kode_pinjaman')
                    ->label('No. Pinjaman')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('anggota.user.name')
                    ->label('Nama Anggota')
                    ->searchable()
                    ->sortable()
                    ->visible(fn() => auth()->user()?->isAnggota() === false),

                TextColumn::make('tanggal_pengajuan')
                    ->label('Tanggal Pengajuan')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('jumlah_pinjaman')
                    ->label('Jumlah Pinjaman')
                    ->formatStateUsing(
                        fn($state) => 'Rp ' . number_format($state, 0, ',', '.')
                    )
                    ->sortable(),

                TextColumn::make('angsuran_per_bulan')
                    ->label('Angsuran / Bulan')
                    ->formatStateUsing(
                        fn($state) => 'Rp ' . number_format($state, 0, ',', '.')
                    ),

                TextColumn::make('jangka_waktu')
                    ->label('Tenor')
                    ->suffix(' Bulan'),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'draft' => 'gray',
                        'menunggu' => 'warning',
                        'disetujui' => 'success',
                        'ditolak' => 'danger',
                        'lunas' => 'info',
                    }),

                TextColumn::make('catatan_pimpinan')
                    ->label('Catatan Pimpinan')
                    ->placeholder('-')
                    ->wrap()
                    ->lineClamp(2)
                    ->tooltip(fn($record) => $record->catatan_pimpinan)
                    ->iconColor('gray')
                    ->color(fn($record) => match ($record->status) {
                        'ditolak' => 'danger',
                        'disetujui' => 'success',
                        default => 'gray',
                    }),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'menunggu' => 'Menunggu',
                        'disetujui' => 'Disetujui',
                        'ditolak' => 'Ditolak',
                        'lunas' => 'Lunas',
                    ]),
            ])
            ->recordActions([
                ActionGroup::make([

                    ViewAction::make()
                        ->label('Detail')
                        ->icon('heroicon-o-eye'),

                    EditAction::make()
                        ->visible(function ($record) {

                            $user = auth()->user();

                            return $user?->isAnggota()
                                && $record->status === 'draft'
                                && $record->anggota?->user_id === $user->id;
                        }),

                    DeleteAction::make()
                        ->visible(
                            fn($record) =>
                            auth()->user()->isAnggota()
                                && $record->status === 'draft'
                        )
                        ->requiresConfirmation()
                        ->modalHeading('Hapus Pinjaman')
                        ->modalDescription(
                            'Apakah Anda yakin ingin menghapus pengajuan pinjaman ini? Data yang telah dihapus tidak dapat dikembalikan.'
                        ),

                    ActionsAction::make('submit')
                        ->label('Ajukan')
                        ->icon('heroicon-o-paper-airplane')
                        ->color('primary')
                        ->visible(
                            fn($record) =>
                            auth()->user()->isAnggota()
                                && $record->status === 'draft'
                        )
                        ->requiresConfirmation()
                        ->modalHeading('Ajukan Pinjaman')
                        ->modalDescription(
                            'Setelah diajukan, data tidak dapat diubah atau dihapus lagi.'
                        )
                        ->action(fn($record) => $record->update([
                            'status' => 'menunggu',
                        ])),

                    ActionsAction::make('approve')
                        ->label('Approve')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->visible(
                            fn($record) =>
                            auth()->user()->isPimpinan()
                                && $record->status === 'menunggu'
                        )
                        ->requiresConfirmation()
                        ->action(fn($record) => $record->update([
                            'status' => 'disetujui',
                            'approved_by' => auth()->id(),
                            'approved_at' => now(),
                        ])),

                    ActionsAction::make('reject')
                        ->label('Reject')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->visible(
                            fn($record) =>
                            auth()->user()?->isPimpinan()
                                && $record->status === 'menunggu'
                        )
                        ->form([
                            Textarea::make('catatan_pimpinan')
                                ->label('Alasan Penolakan')
                                ->rows(4)
                                ->maxLength(500)
                                ->required(),
                        ])
                        ->action(function (array $data, $record): void {

                            $record->update([
                                'status' => 'ditolak',
                                'approved_by' => auth()->id(),
                                'approved_at' => now(),
                                'catatan_pimpinan' => $data['catatan_pimpinan'],
                            ]);
                        }),

                ])
                    ->label('Aksi')
                    ->button()
                    ->color('gray'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
