<?php

namespace App\Filament\Resources\Websites\RelationManagers;

use App\Filament\Resources\Produks\Schemas\ProdukForm;
use App\Filament\Resources\Produks\Tables\ProduksTable;
use App\Filament\Resources\Websites\WebsiteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

use Filament\Schemas\Schema;


class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'produks';

    protected static ?string $title = 'Products';

    protected static ?string $relatedResource = WebsiteResource::class;

    public function table(Table $table): Table
    {
        return ProduksTable::configure($table)
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Produk')
            ]);
    }

    public function form(Schema $schema): Schema
    {
        return ProdukForm::configure($schema);
    }
}
