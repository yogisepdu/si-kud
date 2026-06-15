<?php

namespace App\Filament\Resources\Pinjaman;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\Pinjaman\Pages\CreatePinjaman;
use App\Filament\Resources\Pinjaman\Pages\EditPinjaman;
use App\Filament\Resources\Pinjaman\Pages\ListPinjaman;
use App\Filament\Resources\Pinjaman\Pages\ViewPinjaman;
use App\Filament\Resources\Pinjaman\Schemas\PinjamanForm;
use App\Filament\Resources\Pinjaman\Tables\PinjamanTable;
use App\Filament\Resources\Pinjaman\Widgets\PinjamanStats;
use App\Models\Pinjaman;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Filament\Resources\Pinjaman\Schemas\PinjamanInfolist;

class PinjamanResource extends Resource
{
    protected static ?string $model = Pinjaman::class;

    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedBanknotes;

    protected static ?string $recordTitleAttribute = 'kode_pinjaman';

    protected static ?string $navigationLabel = 'Pinjaman';

    protected static ?string $modelLabel = 'Pinjaman';

    protected static ?string $pluralModelLabel = 'Pinjaman';

    protected static ?int $navigationSort = 2;


    public static function getNavigationGroup(): ?string
    {
        return 'Master Data';
    }

    public static function form(Schema $schema): Schema
    {
        return PinjamanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PinjamanTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $user = auth()->user();

        if (! $user) {
            return $query->whereRaw('1 = 0');
        }

        if ($user->isAnggota()) {

            return $query->whereHas(
                'anggota',
                fn(Builder $query) =>
                $query->where('user_id', $user->id)
            );
        }

        if (
            $user->isAdmin()
            || $user->isPimpinan()
        ) {
            return $query->whereNot('status', 'draft');
        }

        return $query->whereRaw('1 = 0');
    }

    public static function getWidgets(): array
    {
        return [
            PinjamanStats::class,
        ];
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->isAnggota() ?? false;
    }

    public static function canEdit(Model $record): bool
    {
        $user = auth()->user();

        if (! $user) {
            return false;
        }

        // Hanya anggota yang boleh edit draft miliknya
        return $user->isAnggota()
            && $record->status === 'draft'
            && $record->anggota?->user_id === $user->id;
    }

    public static function infolist(Schema $schema): Schema
    {
        return PinjamanInfolist::configure($schema);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPinjaman::route('/'),
            'create' => CreatePinjaman::route('/create'),
            'view' => ViewPinjaman::route('/{record}'),
            'edit' => EditPinjaman::route('/{record}/edit'),
        ];
    }
}
