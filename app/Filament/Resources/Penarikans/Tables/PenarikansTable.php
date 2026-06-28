<?php

namespace App\Filament\Resources\Penarikans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class PenarikansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('tanggal_penarikan', 'desc')
            ->columns([

                TextColumn::make('kode_penarikan')
                    ->label('Kode Penarikan')
                    ->searchable()
                    ->sortable()
                    ->copyable(),

                TextColumn::make('tanggal_penarikan')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('anggota.no_anggota')
                    ->label('No. Anggota')
                    ->searchable(),

                TextColumn::make('anggota.user.name')
                    ->label('Nama Anggota')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jumlah_penarikan')
                    ->label('Jumlah Penarikan')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->alignCenter()
                    ->formatStateUsing(fn(string $state) => match ($state) {
                        'pending' => 'Menunggu',
                        'disetujui' => 'Disetujui',
                        'ditolak' => 'Ditolak',
                        default => ucfirst($state),
                    })
                    ->color(fn(string $state) => match ($state) {
                        'pending' => 'warning',
                        'disetujui' => 'success',
                        'ditolak' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Diinput Oleh')
                    ->badge(),

                TextColumn::make('verifier.name')
                    ->label('Diverifikasi Oleh')
                    ->placeholder('-')
                    ->badge()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Diinput')
                    ->since()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('verified_at')
                    ->label('Tanggal Verifikasi')
                    ->dateTime('d M Y H:i')
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true),


                TextColumn::make('keterangan')
                    ->limit(40)
                    ->tooltip(fn($record) => $record->keterangan),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->slideOver()
                    ->visible(
                        fn($record) =>
                        auth()->user()->isAdmin()
                            && $record->status === 'pending'
                    ),
                DeleteAction::make()
                    ->requiresConfirmation()
                    ->visible(
                        fn($record) =>
                        auth()->user()->isAdmin()
                            && $record->status === 'pending'
                    ),

                Action::make('setujui')
                    ->label('Setujui')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(
                        fn($record) =>
                        auth()->user()->isPimpinan()
                            && $record->status === 'pending'
                    )
                    ->requiresConfirmation()
                    ->action(function ($record) {

                        $record->refresh();

                        if ($record->status !== 'pending') {

                            Notification::make()
                                ->title('Penarikan sudah diproses.')
                                ->danger()
                                ->send();

                            return;
                        }

                        if ($record->anggota->saldo_sukarela < $record->jumlah_penarikan) {

                            Notification::make()
                                ->title('Saldo simpanan sukarela tidak mencukupi.')
                                ->body('Penarikan tidak dapat disetujui karena saldo anggota tidak mencukupi.')
                                ->danger()
                                ->send();

                            return;
                        }

                        $record->update([
                            'status' => 'disetujui',
                            'verified_by' => auth()->id(),
                            'verified_at' => now(),
                        ]);

                        Notification::make()
                            ->title('Penarikan berhasil disetujui.')
                            ->success()
                            ->send();
                    }),

                Action::make('tolak')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(
                        fn($record) =>
                        auth()->user()->isPimpinan()
                            && $record->status === 'pending'
                    )
                    ->requiresConfirmation()
                    ->action(function ($record) {

                        $record->refresh();

                        if ($record->status !== 'pending') {

                            Notification::make()
                                ->title('Penarikan sudah diproses.')
                                ->danger()
                                ->send();

                            return;
                        }

                        $record->update([
                            'status' => 'ditolak',
                            'verified_by' => auth()->id(),
                            'verified_at' => now(),
                        ]);

                        Notification::make()
                            ->title('Penarikan berhasil ditolak.')
                            ->warning()
                            ->send();
                    }),
                Action::make('slip')
                    ->label('Slip')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('info')
                    ->visible(fn($record) => $record->status === 'disetujui')
                    ->url(fn($record) => route(
                        'penarikan.slip',
                        $record
                    ))
                    ->openUrlInNewTab(),
            ])
            ->toolbarActions([]);
    }
}
