<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Pinjaman;
use App\Observers\PinjamanObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    public function boot(): void
    {
        Pinjaman::observe(PinjamanObserver::class);
    }
}
