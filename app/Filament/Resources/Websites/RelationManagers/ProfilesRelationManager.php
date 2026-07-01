<?php

namespace App\Filament\Resources\Websites\RelationManagers;

use App\Filament\Resources\Profiles\Schemas\ProfileForm;
use App\Filament\Resources\Profiles\Tables\ProfilesTable;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;

use Filament\Tables\Table;


class ProfilesRelationManager extends RelationManager
{
    protected static string $relationship = 'profiles';

    protected static ?string $title = 'Profiles';

    public function table(Table $table): Table
    {
        return ProfilesTable::configure($table)
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Profile')
            ]);
    }

    public function form(Schema $schema): Schema
    {
        return ProfileForm::configure($schema);
    }
}
