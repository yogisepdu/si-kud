<?php

namespace App\Filament\Resources\Simpanans;

use App\Filament\Resources\Simpanans\Pages\CreateSimpanan;
use App\Filament\Resources\Simpanans\Pages\EditSimpanan;
use App\Filament\Resources\Simpanans\Pages\ListSimpanans;
use App\Filament\Resources\Simpanans\Schemas\SimpananForm;
use App\Filament\Resources\Simpanans\Tables\SimpanansTable;
use App\Models\Simpanan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SimpananResource extends Resource
{
    protected static ?string $model = Simpanan::class;

    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedWallet;

    protected static ?string $navigationLabel = 'Data Simpanan';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return SimpananForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SimpanansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSimpanans::route('/'),
            'create' => CreateSimpanan::route('/create'),
            'edit' => EditSimpanan::route('/{record}/edit'),
        ];
    }
}
