<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([

                TextInput::make('title')
                    ->label('Judul Foto')
                    ->nullable()
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Foto Galeri')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('gallery')
                    ->imageEditor()
                    ->columnSpanFull(),

                TextInput::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0)
                    ->columnSpan(6),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true)
                    ->columnSpan(6),
                //
            ]);
    }
}
