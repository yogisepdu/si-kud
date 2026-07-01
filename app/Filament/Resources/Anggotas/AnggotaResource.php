<?php

namespace App\Filament\Resources\Anggotas;

use App\Filament\Resources\Anggotas\Pages\CreateAnggota;
use App\Filament\Resources\Anggotas\Pages\EditAnggota;
use App\Filament\Resources\Anggotas\Pages\ListAnggotas;
use App\Filament\Resources\Anggotas\Schemas\AnggotaForm;
use App\Filament\Resources\Anggotas\Tables\AnggotasTable;
use App\Models\Anggota;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Filament\Resources\Anggotas\RelationManagers\PinjamansRelationManager;
use App\Filament\Resources\Anggotas\RelationManagers\AngsuransRelationManager;

class AnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;

    protected static ?string $navigationLabel = 'Angsuran';

    protected static ?string $modelLabel = 'Anggota';

    protected static ?string $pluralModelLabel = 'Angsuran';

    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedReceiptPercent;

    public static function getNavigationGroup(): ?string
    {
        return 'Simpan-Pinjam';
    }

    public static function form(Schema $schema): Schema
    {
        return AnggotaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnggotasTable::configure($table);
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->isAdminOrPimpinan() ?? false;
    }

    public static function getRelations(): array
    {
        return [

            // PinjamansRelationManager::class,

            AngsuransRelationManager::class,

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnggotas::route('/'),
            'view' => Pages\ViewAnggota::route('/{record}'),
        ];
    }
}
