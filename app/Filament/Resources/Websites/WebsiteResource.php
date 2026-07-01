<?php

namespace App\Filament\Resources\Websites;

use App\Filament\Resources\Websites\Pages\CreateWebsite;
use App\Filament\Resources\Websites\Pages\EditWebsite;
use App\Filament\Resources\Websites\Pages\ListWebsites;
use App\Filament\Resources\Websites\RelationManagers\BeritasRelationManager;
use App\Filament\Resources\Websites\RelationManagers\GalleriesRelationManager;
use App\Filament\Resources\Websites\RelationManagers\PengumumenRelationManager;
use App\Filament\Resources\Websites\RelationManagers\ProductsRelationManager;
use App\Filament\Resources\Websites\RelationManagers\ProfilesRelationManager;
use App\Filament\Resources\Websites\RelationManagers\SlidersRelationManager;
use App\Filament\Resources\Websites\Schemas\WebsiteForm;
use App\Filament\Resources\Websites\Tables\WebsitesTable;
use App\Models\Website;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WebsiteResource extends Resource
{
    protected static ?string $model = Website::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPresentationChartBar;

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?string $navigationLabel = 'Kelola Website';

    protected static ?string $modelLabel = 'Website';

    protected static ?string $pluralModelLabel = 'Website';

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Website';
    }

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return WebsiteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WebsitesTable::configure($table);
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    public static function getRelations(): array
    {
        return [
            SlidersRelationManager::class,
            ProfilesRelationManager::class,
            ProductsRelationManager::class,
            GalleriesRelationManager::class,
            BeritasRelationManager::class,
            PengumumenRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWebsites::route('/'),
            'create' => CreateWebsite::route('/create'),
            'edit' => EditWebsite::route('/{record}/edit'),
        ];
    }
}
