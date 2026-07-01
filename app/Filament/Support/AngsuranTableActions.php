<?php

namespace App\Filament\Support;

use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;

trait AngsuranTableActions
{
    protected static function getAngsuranActions(): array
    {
        return [

            Action::make('slip')
                ->label('Slip')
                ->icon('heroicon-o-document-arrow-down')
                ->color('success')

                ->visible(
                    fn($record) =>
                    $record->status === 'dibayar'
                )

                ->url(
                    fn($record) =>
                    route('angsuran.slip', $record)
                )

                ->openUrlInNewTab(),

            Action::make('lihat_bukti')
                ->label('Lihat Bukti')
                ->icon('heroicon-o-eye')
                ->color('info')

                ->visible(
                    fn($record) =>
                    auth()->user()?->isAdminOrPimpinan()
                        && $record->status === 'menunggu_verifikasi'
                )

                ->modalContent(
                    fn($record) =>
                    view(
                        'angsurans.bukti-transfer.bukti-pembayaran',
                        [
                            'file' => $record->bukti_bayar,
                        ]
                    )
                ),

            Action::make('approve')
                ->label('Approve')
                ->icon('heroicon-o-check-circle')
                ->color('success')

                ->visible(
                    fn($record) =>
                    auth()->user()?->isAdminOrPimpinan()
                        && $record->status === 'menunggu_verifikasi'
                )

                ->requiresConfirmation()

                ->action(function ($record): void {

                    $record->update([
                        'status' => 'dibayar',
                        'alasan_penolakan' => null,
                    ]);
                }),

            Action::make('tolak')
                ->label('Tolak')
                ->icon('heroicon-o-x-circle')
                ->color('danger')

                ->visible(
                    fn($record) =>
                    auth()->user()?->isAdminOrPimpinan()
                        && $record->status === 'menunggu_verifikasi'
                )

                ->form([

                    Textarea::make('alasan_penolakan')
                        ->label('Alasan Penolakan')
                        ->rows(4)
                        ->required()
                        ->maxLength(500),

                ])

                ->action(function (array $data, $record): void {

                    $record->update([
                        'status' => 'ditolak',
                        'verified_by' => auth()->id(),
                        'verified_at' => now(),
                        'alasan_penolakan' => $data['alasan_penolakan'],
                    ]);
                }),

        ];
    }
}
