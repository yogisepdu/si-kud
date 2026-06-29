<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Logout extends Page
{
    protected static ?string $navigationLabel = 'Logout';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-arrow-right-on-rectangle';

    protected static ?int $navigationSort = 9999;

    protected static bool $shouldRegisterNavigation = true;

    public static function getNavigationGroup(): ?string
    {
        return 'Pengaturan';
    }

    public function mount(): void
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        $this->redirect('/');
    }
}
