<?php

namespace App\Filament\Resources\Users\Tables;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                BadgeColumn::make('role')
                    ->label('Hak Akses')
                    ->colors([
                        'danger' => 'administrator',
                        'success' => 'pimpinan',
                        'warning' => 'anggota',
                    ]),

                BadgeColumn::make('status')
                    ->label('Status Akun')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'active',
                        'danger' => 'rejected',
                    ])
                    ->formatStateUsing(fn(?string $state): string => match ($state) {
                        'pending' => 'Menunggu Persetujuan',
                        'active' => 'Aktif',
                        'rejected' => 'Ditolak',
                        default => '-',
                    }),
            ])

            ->filters([
                //
            ])

            ->recordActions([

                /*
                |--------------------------------------------------------------------------
                | SETUJUI PENDAFTARAN
                |--------------------------------------------------------------------------
                */

                Action::make('approve')
                    ->label('Setujui')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(
                        fn(User $record): bool =>
                        $record->role === User::ANGGOTA &&
                            $record->status === 'pending'
                    )
                    ->requiresConfirmation()
                    ->modalHeading('Setujui Pendaftaran Anggota')
                    ->modalDescription(
                        'Apakah Anda yakin ingin menyetujui pendaftaran anggota ini?'
                    )
                    ->modalSubmitActionLabel('Ya, Setujui')
                    ->action(function (User $record) {

                        $record->update([
                            'status' => 'active',
                            'rejection_reason' => null,
                        ]);

                        Notification::make()
                            ->success()
                            ->title('Pendaftaran disetujui')
                            ->body(
                                "Akun {$record->name} sekarang dapat login sebagai anggota."
                            )
                            ->send();
                    }),

                /*
                |--------------------------------------------------------------------------
                | TOLAK PENDAFTARAN
                |--------------------------------------------------------------------------
                */

                Action::make('reject')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(
                        fn(User $record): bool =>
                        $record->role === User::ANGGOTA &&
                            $record->status === 'pending'
                    )
                    ->requiresConfirmation()
                    ->modalHeading('Tolak Pendaftaran Anggota')
                    ->modalDescription(
                        'Apakah Anda yakin ingin menolak pendaftaran anggota ini?'
                    )
                    ->modalSubmitActionLabel('Ya, Tolak')
                    ->form([
                        Textarea::make('alasan')
                            ->label('Alasan Penolakan')
                            ->placeholder('Masukkan alasan penolakan...')
                            ->rows(4)
                            ->required(),
                    ])
                    ->action(function (User $record, array $data) {

                        $record->update([
                            'status' => 'rejected',
                            'rejection_reason' => $data['alasan'],
                        ]);

                        Notification::make()
                            ->danger()
                            ->title('Pendaftaran ditolak')
                            ->body(
                                "Pendaftaran {$record->name} telah ditolak."
                            )
                            ->send();
                    }),

                /*
                |--------------------------------------------------------------------------
                | EDIT
                |--------------------------------------------------------------------------
                */

                EditAction::make(),

                /*
                |--------------------------------------------------------------------------
                | HAPUS
                |--------------------------------------------------------------------------
                */

                Action::make('delete')
                    ->label('Hapus')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (User $record) {
                        $record->delete();
                    }),

                /*
                |--------------------------------------------------------------------------
                | RESET PASSWORD
                |--------------------------------------------------------------------------
                */

                Action::make('reset_password')
                    ->label('Reset Password')
                    ->icon('heroicon-o-key')
                    ->color('warning')
                    ->form([
                        TextInput::make('password')
                            ->label('Password Baru')
                            ->password()
                            ->required()
                            ->confirmed(),

                        TextInput::make('password_confirmation')
                            ->label('Konfirmasi Password')
                            ->password()
                            ->required(),
                    ])
                    ->action(function (User $record, array $data) {

                        $record->update([
                            'password' => Hash::make($data['password']),
                        ]);

                        Notification::make()
                            ->success()
                            ->title('Password berhasil direset')
                            ->send();
                    }),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
