<?php

namespace App\Filament\Resources\Pengumuman;

use App\Filament\Resources\Pengumuman\Pages\CreatePengumuman;
use App\Filament\Resources\Pengumuman\Pages\EditPengumuman;
use App\Filament\Resources\Pengumuman\Pages\ListPengumuman;
use App\Filament\Resources\Pengumuman\Schemas\PengumumanForm;
use App\Filament\Resources\Pengumuman\Tables\PengumumanTable;
use App\Models\Pengumuman;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PengumumanResource extends Resource
{
    protected static ?string $model = Pengumuman::class;

    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedSpeakerWave;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?int $navigationSort = 4;

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Website';
    }

    public static function form(Schema $schema): Schema
    {
        return PengumumanForm::configure($schema);
    }


    public static function table(Table $table): Table
    {
        return PengumumanTable::configure($table);
    }

    // public static function shouldRegisterNavigation(): bool
    // {
    //     return auth()->user()?->isAdmin() ?? false;
    // }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
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
            'index' => ListPengumuman::route('/'),
            'create' => CreatePengumuman::route('/create'),
            'edit' => EditPengumuman::route('/{record}/edit'),
        ];
    }
}
