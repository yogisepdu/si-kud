<?php

namespace App\Filament\Resources\Produks\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class ProdukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Select::make('type')
                    ->label('Jenis Layanan')
                    ->options([
                        'pupuk' => 'Layanan Pupuk',
                        'tbs' => 'Layanan TBS',
                        'simpan_pinjam' => 'Simpan Pinjam',
                    ])
                    ->required(),

                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                RichEditor::make('content')
                    ->label('Isi Konten')
                    ->required()
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
