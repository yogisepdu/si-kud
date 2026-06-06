<?php

namespace App\Filament\Resources\Profiles\Pages;

use App\Filament\Resources\Profiles\ProfileResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Models\Profile;
use Filament\Actions;

class ListProfiles extends ListRecords
{
    protected static string $resource = ProfileResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [];

        if (! Profile::exists()) {
            $actions[] = Actions\CreateAction::make();
        }

        return $actions;
    }
}
