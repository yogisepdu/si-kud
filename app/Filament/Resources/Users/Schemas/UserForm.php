<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
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

                        TextInput::make('name')
                            ->label('Nama')
                            ->required(),

                        TextInput::make('email')
                            ->email()
                            ->required(),

                        Select::make('role')
                            ->label('Hak Akses')
                            ->options([
                                'administrator' => 'Administrator',
                                'pimpinan' => 'Pimpinan',
                                'anggota' => 'Anggota',
                            ])
                            ->required(),

                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            ->dehydrateStateUsing(
                                fn ($state) => filled($state)
                                    ? Hash::make($state)
                                    : null
                            )
                            ->dehydrated(
                                fn ($state) => filled($state)
                            )
                            ->required(
                                fn (string $operation): bool =>
                                    $operation === 'create'
                            ),

            ]);
    }
}