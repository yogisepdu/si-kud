<?php

namespace App\Filament\Resources\Pengumuman\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class PengumumanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            //
            ->columns(12)
            ->components([

                TextInput::make('title')
                    ->label('Judul Pengumuman')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->label('Deskripsi Singkat')
                    ->rows(4)
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Gambar Pengumuman')
                    ->image()
                    ->disk('public')
                    ->directory('pengumuman')
                    ->imageEditor()
                    ->nullable()
                    ->columnSpan(6),

                TextInput::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0)
                    ->columnSpan(3),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true)
                    ->columnSpan(3),
            ]);
    }
}
