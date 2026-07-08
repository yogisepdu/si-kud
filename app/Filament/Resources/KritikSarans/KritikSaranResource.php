<?php

namespace App\Filament\Resources\KritikSarans;

use App\Filament\Resources\KritikSarans\Pages\CreateKritikSaran;
use App\Filament\Resources\KritikSarans\Pages\EditKritikSaran;
use App\Filament\Resources\KritikSarans\Pages\ListKritikSarans;
use App\Filament\Resources\KritikSarans\Schemas\KritikSaranForm;
use App\Filament\Resources\KritikSarans\Tables\KritikSaransTable;
use App\Models\KritikSaran;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KritikSaranResource extends Resource
{
    protected static ?string $model = KritikSaran::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Website';
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return KritikSaranForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KritikSaransTable::configure($table);
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
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
            'index' => ListKritikSarans::route('/'),
        ];
    }
}
