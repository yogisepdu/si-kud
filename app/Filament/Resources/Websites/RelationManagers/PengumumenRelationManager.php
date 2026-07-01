<?php

namespace App\Filament\Resources\Websites\RelationManagers;

use App\Filament\Resources\Pengumuman\Schemas\PengumumanForm;
use App\Filament\Resources\Pengumuman\Tables\PengumumanTable;
use App\Filament\Resources\Websites\WebsiteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

use Filament\Schemas\Schema;


class PengumumenRelationManager extends RelationManager
{
    protected static string $relationship = 'pengumumen';

    protected static ?string $title = 'Pengumuman';

    protected static ?string $relatedResource = WebsiteResource::class;


    public function table(Table $table): Table
    {
        return PengumumanTable::configure($table)
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Gallery')
            ]);
    }

    public function form(Schema $schema): Schema
    {
        return PengumumanForm::configure($schema);
    }
}
