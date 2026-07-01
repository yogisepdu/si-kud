<?php

namespace App\Filament\Resources\DataAnggotas;

use App\Filament\Resources\DataAnggotas\Pages\CreateDataAnggota;
use App\Filament\Resources\DataAnggotas\Pages\EditDataAnggota;
use App\Filament\Resources\DataAnggotas\Pages\ListDataAnggotas;
use App\Filament\Resources\DataAnggotas\Schemas\DataAnggotaForm;
use App\Filament\Resources\DataAnggotas\Tables\DataAnggotasTable;
use App\Models\Anggota;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DataAnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $modelLabel = 'Data Anggota';

    protected static ?string $pluralModelLabel = 'Data Anggota';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return 'Master Data';
    }

    public static function form(Schema $schema): Schema
    {
        return DataAnggotaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataAnggotasTable::configure($table);
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->isAdminOrPimpinan() ?? false;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('user');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataAnggotas::route('/'),
        ];
    }
}
