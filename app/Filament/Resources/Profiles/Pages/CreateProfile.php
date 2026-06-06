<?php

namespace App\Filament\Resources\Profiles\Pages;

use App\Filament\Resources\Profiles\ProfileResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Profile;
use Filament\Notifications\Notification;

class CreateProfile extends CreateRecord
{
    protected static string $resource = ProfileResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function mount(): void
    {
        if (Profile::exists()) {

            Notification::make()
                ->danger()
                ->title('Profil KUD sudah tersedia.')
                ->send();

            $this->redirect(ProfileResource::getUrl());
        }

        parent::mount();
    }
}
