<?php

namespace App\Filament\Resources\Beritas;

use App\Filament\Resources\Beritas\Pages\CreateBerita;
use App\Filament\Resources\Beritas\Pages\EditBerita;
use App\Filament\Resources\Beritas\Pages\ListBeritas;
use App\Filament\Resources\Beritas\Schemas\BeritaForm;
use App\Filament\Resources\Beritas\Tables\BeritasTable;
use App\Filament\Resources\Beritas\Widgets\BeritaStats;
use App\Filament\Resources\Beritas\Widgets\BeritaTerpopuler;
use App\Models\Berita;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Berita';

    protected static ?string $modelLabel = 'Berita';

    protected static ?string $pluralModelLabel = 'Daftar Berita';

    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedNewspaper;

    protected static ?int $navigationSort = 6;

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Website';
    }

    public static function form(Schema $schema): Schema
    {
        return BeritaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BeritasTable::configure($table);
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->check();
    }

    public static function canViewAny(): bool
    {
        return auth()->check();
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $user = auth()->user();

        // Admin bisa melihat semua berita
        if ($user?->isAdmin()) {
            return $query;
        }

        // Pimpinan & Anggota hanya melihat berita publish
        return $query->where('is_publish', true);
    }

    public static function getWidgets(): array
    {
        return [
            BeritaStats::class,
            BeritaTerpopuler::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBeritas::route('/'),
            'create' => CreateBerita::route('/create'),
            'edit' => EditBerita::route('/{record}/edit'),
        ];
    }
}
