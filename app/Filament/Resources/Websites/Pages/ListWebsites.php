<?php

namespace App\Filament\Resources\Websites\Pages;

use App\Filament\Resources\Websites\WebsiteResource;
use App\Models\Website;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWebsites extends ListRecords
{
    protected static string $resource = WebsiteResource::class;

    public function mount(): void
    {
        $website = Website::first();

        if (! $website) {
            $website = Website::create([
                'nama' => 'Website KUD',
            ]);
        }

        $this->redirect(
            WebsiteResource::getUrl('edit', [
                'record' => $website,
            ])
        );
    }
}
