<?php

namespace App\Filament\Resources\KritikSarans\Pages;

use App\Filament\Resources\KritikSarans\KritikSaranResource;
use App\Mail\BalasanKritikSaranMail;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;

class EditKritikSaran extends EditRecord
{
    protected static string $resource = KritikSaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('balas_email')
                ->label('Balas Email')
                ->icon('heroicon-o-paper-airplane')
                ->color('success')
                ->modalHeading('Balas Kritik & Saran')
                ->modalDescription(fn($record) => 'Balasan akan dikirim ke email: ' . $record->email)
                ->modalSubmitActionLabel('Kirim Balasan')
                ->schema([
                    Textarea::make('balasan')
                        ->label('Isi Balasan')
                        ->placeholder('Tulis balasan untuk pengunjung...')
                        ->rows(8)
                        ->required(),
                ])
                ->fillForm(fn($record): array => [
                    'balasan' => $record->balasan,
                ])
                ->action(function (array $data, $record): void {
                    try {
                        Mail::to($record->email)->send(
                            new BalasanKritikSaranMail($record, $data['balasan'])
                        );

                        $record->update([
                            'balasan' => $data['balasan'],
                            'dibalas_pada' => now(),
                            'dibaca' => true,
                        ]);

                        Notification::make()
                            ->title('Balasan berhasil dikirim')
                            ->body('Email balasan berhasil dikirim ke ' . $record->email)
                            ->success()
                            ->send();
                    } catch (\Throwable $e) {
                        Notification::make()
                            ->title('Gagal mengirim email')
                            ->body($e->getMessage())
                            ->danger()
                            ->send();
                    }
                }),

            DeleteAction::make()
                ->label('Hapus'),
        ];
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Status kritik dan saran berhasil diperbarui';
    }
}
