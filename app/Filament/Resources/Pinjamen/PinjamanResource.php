<?php

namespace App\Filament\Resources\Pinjamen;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\Pinjamen\Pages\CreatePinjaman;
use App\Filament\Resources\Pinjamen\Pages\EditPinjaman;
use App\Filament\Resources\Pinjamen\Pages\ListPinjamen;
use App\Filament\Resources\Pinjamen\Pages\ViewPinjaman;
use App\Filament\Resources\Pinjamen\Schemas\PinjamanForm;
use App\Filament\Resources\Pinjamen\Tables\PinjamenTable;
use App\Filament\Resources\Pinjamen\Widgets\PinjamanStats;
use App\Models\Pinjaman;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Filament\Resources\Pinjamen\Schemas\PinjamanInfolist;

class PinjamanResource extends Resource
{
    protected static ?string $model = Pinjaman::class;

    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedBanknotes;

    protected static ?string $recordTitleAttribute = 'kode_pinjaman';

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
        return PinjamenTable::configure($table);
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
            'index' => ListPinjamen::route('/'),
            'create' => CreatePinjaman::route('/create'),
            'view' => ViewPinjaman::route('/{record}'),
            'edit' => EditPinjaman::route('/{record}/edit'),
        ];
    }
}
