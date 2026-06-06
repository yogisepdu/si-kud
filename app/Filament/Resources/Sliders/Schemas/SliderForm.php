<?php

namespace App\Filament\Resources\Sliders\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section as ComponentsSection;

class SliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                ComponentsSection::make('Informasi Slider')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->required(),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(4),

                        FileUpload::make('image')
                            ->label('Gambar Slider')
                            ->image()
                            ->directory('sliders')
                            ->disk('public')
                            ->required(),

                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric(),

                        Toggle::make('is_active')
                            ->label('Aktif'),
                    ])
                    ->columnSpanFull()
                    ->columns(2),
            ]);
    }
}
