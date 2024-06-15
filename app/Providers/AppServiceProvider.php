<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::if('canViewCreator', function () {
            return auth()->user()->can('view', App\Models\Teacher::class);
        });
        Blade::if('canMakeContent', function () {
            return auth()->user()->can('make', App\Models\Content::class);
        });
        Blade::if('notSuperAdmin', function () {
            return auth()->user()->can('notadmin');
        });
    }
}
