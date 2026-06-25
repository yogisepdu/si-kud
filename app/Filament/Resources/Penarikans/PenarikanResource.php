<?php

namespace App\Filament\Resources\Penarikans;

use App\Filament\Resources\Penarikans\Pages\CreatePenarikan;
use App\Filament\Resources\Penarikans\Pages\EditPenarikan;
use App\Filament\Resources\Penarikans\Pages\ListPenarikans;
use App\Filament\Resources\Penarikans\Schemas\PenarikanForm;
use App\Filament\Resources\Penarikans\Tables\PenarikansTable;
use App\Models\Penarikan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\Anggota;
use Filament\Forms;

class PenarikanResource extends Resource
{
    protected static ?string $model = Penarikan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PenarikanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PenarikansTable::configure($table);
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
            'index' => ListPenarikans::route('/'),
            'create' => CreatePenarikan::route('/create'),
            'edit' => EditPenarikan::route('/{record}/edit'),
        ];
    }
}
