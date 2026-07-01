<?php

namespace App\Filament\Resources\Penarikans;

use App\Filament\Resources\Penarikans\Pages\CreatePenarikan;
use App\Filament\Resources\Penarikans\Pages\EditPenarikan;
use App\Filament\Resources\Penarikans\Pages\ListPenarikans;
use App\Filament\Resources\Penarikans\Schemas\PenarikanForm;
use App\Filament\Resources\Penarikans\Tables\PenarikansTable;
use App\Filament\Resources\Penarikans\Widgets\AdminPenarikanStats;
use App\Filament\Resources\Penarikans\Widgets\AnggotaPenarikanStats;
use App\Filament\Resources\Penarikans\Widgets\PimpinanPenarikanStats;
use App\Models\Penarikan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class PenarikanResource extends Resource
{
    protected static ?string $model = Penarikan::class;

    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedCurrencyDollar;

    protected static ?string $navigationLabel = 'Data Penarikan';

    protected static ?int $navigationSort = 4;

    public static function getNavigationGroup(): ?string
    {
        return 'Simpan-Pinjam';
    }

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

    /**
     * Anggota hanya dapat melihat data penarikannya sendiri.
     */
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $user = Auth::user();

        if ($user->isAnggota()) {
            return $query->whereHas('anggota', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        }

        return $query;
    }

    /**
     * Hanya Administrator yang dapat membuat data.
     */
    public static function canCreate(): bool
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Administrator hanya dapat mengubah data
     * sebelum diverifikasi pimpinan.
     */
    public static function canEdit($record): bool
    {
        return auth()->user()->isAdmin()
            && $record->status === 'pending';
    }

    /**
     * Administrator hanya dapat menghapus data
     * sebelum diverifikasi pimpinan.
     */
    public static function canDelete($record): bool
    {
        return auth()->user()->isAdmin()
            && $record->status === 'pending';
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
