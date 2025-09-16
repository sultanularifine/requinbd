<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Basic;
use Illuminate\Support\ServiceProvider;

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
    
    public function boot()
{
    // Share $basic with all views
    $basic = Basic::first();
    View::share('basic', $basic);
}
}
