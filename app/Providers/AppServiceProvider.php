<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrapFour();
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
