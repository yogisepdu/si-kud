<?php

namespace App\Filament\Resources\Angsurans;

use App\Filament\Resources\Angsurans\Pages\CreateAngsuran;
use App\Filament\Resources\Angsurans\Pages\EditAngsuran;
use App\Filament\Resources\Angsurans\Pages\ListAngsurans;
use App\Filament\Resources\Angsurans\Schemas\AngsuranForm;
use App\Filament\Resources\Angsurans\Tables\AngsuransTable;
use App\Models\Angsuran;
use BackedEnum;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AngsuranResource extends Resource
{
    protected static ?string $model = Angsuran::class;

    protected static ?string $navigationLabel = 'Angsuran';

    protected static ?string $modelLabel = 'Angsuran';

    protected static ?string $pluralModelLabel = 'Angsuran';

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCreditCard;

    protected static ?int $navigationSort = 3;

    public static function getNavigationGroup(): ?string
    {
        return 'Master Data';
    }

    public static function form(Schema $schema): Schema
    {
        return AngsuranForm::configure($schema);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return AngsuransTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->isAnggota() ?? false;
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $user = auth()->user();

        if ($user?->isAnggota()) {

            $anggotaId = $user->anggota?->id;

            if ($anggotaId) {
                $query->whereHas('pinjaman', function (Builder $query) use ($anggotaId) {
                    $query->where('anggota_id', $anggotaId);
                });
            } else {
                $query->whereRaw('1 = 0');
            }
        }

        return $query;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAngsurans::route('/'),
            'view' => Pages\ViewAngsuran::route('/{record}'),
            'edit' => Pages\EditAngsuran::route('/{record}/edit'),
        ];
    }
}
