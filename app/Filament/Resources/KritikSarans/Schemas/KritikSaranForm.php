<?php

namespace App\Filament\Resources\KritikSarans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class KritikSaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Section::make('Informasi Pengirim')
                ->schema([

                    TextInput::make('nama')
                        ->disabled(),

                    TextInput::make('email')
                        ->disabled(),

                    TextInput::make('judul')
                        ->disabled(),

                ])->columns(2),

                Section::make('Isi Kritik & Saran')
                    ->schema([

                        Textarea::make('pesan')
                            ->rows(8)
                            ->disabled()

                    ])
            ]);
    }
}
