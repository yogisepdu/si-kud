<?php

namespace App\Filament\Resources\Websites\RelationManagers;

use App\Filament\Resources\Websites\WebsiteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use App\Filament\Resources\Beritas\Tables\BeritasTable;
use App\Filament\Resources\Beritas\Schemas\BeritaForm;
use Filament\Schemas\Schema;

class BeritasRelationManager extends RelationManager
{
    protected static string $relationship = 'beritas';

    protected static ?string $title = 'Berita';

    protected static ?string $relatedResource = WebsiteResource::class;

    public function table(Table $table): Table
    {
        return BeritasTable::configure($table)
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Berita')
            ]);
    }

    public function form(Schema $schema): Schema
    {
        return BeritaForm::configure($schema);
    }
}
