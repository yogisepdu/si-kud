<?php

namespace App\Filament\Resources\KritikSarans\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class KritikSaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama Lengkap')
                    ->disabled(),

                TextInput::make('email')
                    ->label('Email')
                    ->disabled(),

                TextInput::make('judul')
                    ->label('Judul')
                    ->disabled(),

                Textarea::make('pesan')
                    ->label('Kritik / Saran')
                    ->rows(6)
                    ->disabled()
                    ->columnSpanFull(),

                Textarea::make('balasan')
                    ->label('Balasan Admin')
                    ->rows(6)
                    ->placeholder('Belum ada balasan.')
                    ->disabled()
                    ->columnSpanFull(),

                TextInput::make('dibalas_pada')
                    ->label('Tanggal Dibalas')
                    ->disabled(),

                Toggle::make('dibaca')
                    ->label('Sudah Dibaca')
                    ->helperText('Aktifkan jika kritik dan saran ini sudah dibaca oleh admin.'),
            ]);
    }
}
