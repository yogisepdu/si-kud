<?php

namespace App\Filament\Resources\Websites\RelationManagers;

use App\Filament\Resources\Galleries\Schemas\GalleryForm;
use App\Filament\Resources\Galleries\Tables\GalleriesTable;
use App\Filament\Resources\Websites\WebsiteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

use Filament\Schemas\Schema;


class GalleriesRelationManager extends RelationManager
{
    protected static string $relationship = 'galleries';

    protected static ?string $title = 'Galleries';

    protected static ?string $relatedResource = WebsiteResource::class;

    public function table(Table $table): Table
    {
        return GalleriesTable::configure($table)
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Gallery')
            ]);
    }

    public function form(Schema $schema): Schema
    {
        return GalleryForm::configure($schema);
    }
}
