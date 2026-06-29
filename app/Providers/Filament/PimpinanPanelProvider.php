<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\EditProfile;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationItem;


class PimpinanPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('pimpinan')
            ->path('pimpinan')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->brandName('SI-KUD Kampar')
            ->brandLogo(asset('assets/img/logo.jpeg'))
            ->discoverResources(
                in: app_path('Filament/Resources'),
                for: 'App\Filament\Resources'
            )
            ->discoverPages(
                in: app_path('Filament/Pages'),
                for: 'App\Filament\Pages'
            )
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(
                in: app_path('Filament/Widgets'),
                for: 'App\Filament\Widgets'
            )
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->navigationGroups([
                'Master Data',
                'Simpan-Pinjam',
                'Manajemen Website',
            ])
            ->profile(EditProfile::class)
            ->userMenuItems([
                'profile' => MenuItem::make()
                    ->label('Pengaturan')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->url(function () {
                        $panel = auth()->user()->getPanelPrefix();

                        return route("filament.{$panel}.auth.profile");
                    }),

            ])
            ->navigationItems([

                NavigationItem::make('Pengaturan')
                    ->group('Pengaturan')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->sort(1)
                    ->url(fn() => route(
                        'filament.' . auth()->user()->getPanelPrefix() . '.auth.profile'
                    )),

            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
