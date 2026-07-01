<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Informasi Berita')
                ->schema([

                    TextInput::make('judul')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(
                            fn($state, callable $set) =>
                            $set('slug', \Str::slug($state))
                        )
                        ->columnSpanFull(),

                    TextInput::make('slug')
                        ->disabled()
                        ->required()
                        ->columnSpanFull(),

                    DatePicker::make('tanggal')
                        ->required(),

                    Toggle::make('is_publish')
                        ->label('Publikasikan'),


                    Textarea::make('ringkasan')
                        ->label('Ringkasan Berita')
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Section::make('Konten Berita')
                ->schema([

                    FileUpload::make('gambar')
                        ->disk('public')
                        ->directory('berita')
                        ->image()
                        ->imageEditor(),

                    RichEditor::make('isi')
                        ->columnSpanFull(),

                ]),

        ]);
    }
}
