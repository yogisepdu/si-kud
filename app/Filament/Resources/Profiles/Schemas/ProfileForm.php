<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('title')
                    ->label('Judul')
                    ->required(),

                RichEditor::make('history')
                    ->label('Sejarah')
                    ->required()
                    ->extraInputAttributes([
                        'style' => 'min-height: 120px;',
                    ])
                    ->columnSpanFull(),

                RichEditor::make('vision')
                    ->label('Visi')
                    ->required()
                    ->extraInputAttributes([
                        'style' => 'min-height: 120px;',
                    ])
                    ->columnSpanFull(),

                RichEditor::make('mission')
                    ->label('Misi')
                    ->required()
                    ->extraInputAttributes([
                        'style' => 'min-height: 120px;',
                    ])
                    ->columnSpanFull(),
                FileUpload::make('structure_image')
                    ->label('Gambar Struktur Organisasi')
                    ->image()
                    ->disk('public')
                    ->directory('profiles')
                    ->nullable()
                    ->preserveFilenames(false)
                    ->imageEditor()
                    ->columnSpanFull(),
            ]);
    }
}
