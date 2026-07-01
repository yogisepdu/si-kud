<?php

namespace App\Filament\Resources\Websites\RelationManagers;

use App\Filament\Resources\Sliders\Schemas\SliderForm;
use App\Filament\Resources\Sliders\Tables\SlidersTable;
use App\Filament\Resources\Websites\WebsiteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

use Filament\Schemas\Schema;

class SlidersRelationManager extends RelationManager
{
    protected static string $relationship = 'sliders';

    protected static ?string $title = 'Sliders';

    protected static ?string $relatedResource = WebsiteResource::class;

    public function table(Table $table): Table
    {
        return SlidersTable::configure($table)
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Slider')
            ]);
    }

    public function form(Schema $schema): Schema
    {
        return SliderForm::configure($schema);
    }
}
