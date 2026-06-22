<?php

namespace App\Filament\Resources\Simpanans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;

class SimpanansTable
{
    public static function configure(Table $table): Table
    {
        $isAnggota = Auth::user()?->role === 'anggota';

        return $table
            ->modifyQueryUsing(fn($query) => $query->with('items'))
            ->columns([
                TextColumn::make('kode_simpanan')
                    ->searchable()
                    ->visible(! $isAnggota),

                TextColumn::make('anggota.user.name')
                    ->label('Nama Anggota')
                    ->searchable()
                    ->visible(! $isAnggota),

                TextColumn::make('items')
                    ->label('Detail Simpanan')
                    ->html()
                    ->wrap()
                    ->state(function ($record) {

                        return $record->items
                            ->map(
                                fn($item) =>
                                ucfirst($item->jenis)
                                    . ' : Rp '
                                    . number_format($item->jumlah, 0, ',', '.')
                            )
                            ->join('<br>');
                    }),

                TextColumn::make('items_total')
                    ->label('Total Nominal')
                    ->money('IDR')
                    ->state(fn($record) => $record->items->sum('jumlah')),

                TextColumn::make('tanggal')
                    ->label('Tanggal Setor')
                    ->date('d M Y'),

                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn($state) => match ($state) {
                        'pending' => 'Menunggu Verifikasi',
                        'terverifikasi' => 'Terverifikasi',
                        'ditolak' => 'Ditolak',
                        default => $state,
                    })
                    ->color(fn($state) => match ($state) {
                        'pending' => 'warning',
                        'terverifikasi' => 'success',
                        'ditolak' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                //
            ])
            ->recordActions([

                EditAction::make()
                    ->visible(
                        fn($record) =>
                        auth()->user()->role === 'administrator'
                            && $record->status === 'pending'
                    ),
                DeleteAction::make()
                    ->visible(
                        fn($record) =>
                        auth()->user()->role === 'administrator'
                            && $record->status === 'pending'
                    ),

                Action::make('approve')
                    ->label('Verifikasi')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(
                        fn($record) =>
                        auth()->user()->role === 'pimpinan'
                            && $record->status === 'pending'
                    )
                    ->action(function ($record) {

                        $record->update([
                            'status' => 'terverifikasi',
                            'verified_by' => Auth::id(),
                            'verified_at' => now(),
                        ]);
                    }),

                Action::make('reject')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->visible(
                        fn($record) =>
                        auth()->user()->role === 'pimpinan'
                            && $record->status === 'pending'
                    )
                    ->action(function ($record) {

                        $record->update([
                            'status' => 'ditolak',
                            'verified_by' => Auth::id(),
                            'verified_at' => now(),
                        ]);
                    }),
                Action::make('slip')
                    ->label('Slip')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('info')
                    ->visible(fn($record) => $record->status === 'terverifikasi')
                    ->url(fn($record) => route(
                        'simpanan.slip',
                        $record
                    ))
                    ->openUrlInNewTab(),

            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ])->visible(fn() => auth()->user()->role === 'administrator'),
            ]);
    }
}
