<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $providers = config('providers.providers',[]);
        foreach ($providers as $provider){
            $this->app->register($provider);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Alias loader
        $loader = AliasLoader::getInstance();
        $loader->alias('DataTables', \Yajra\DataTables\Facades\DataTables::class);
        $loader->alias('Cart', \Gloudemans\Shoppingcart\Facades\Cart::class);
        Paginator::useBootstrapFive();
    }
}
