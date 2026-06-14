<?php

namespace App\Filament\Resources\Angsurans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AngsuranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Angsuran')
                    ->schema([

                        TextInput::make('angsuran_ke')
                            ->disabled(),

                        DatePicker::make('jatuh_tempo')
                            ->disabled(),

                        TextInput::make('nominal')
                            ->disabled(),

                        DatePicker::make('tanggal_bayar')
                            ->disabled(),

                    ])
                    ->columns(2),
            ]);
    }
}
