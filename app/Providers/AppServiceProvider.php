<?php

namespace App\Providers;

use App\Http\ViewComposers\NavbarComposer;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       
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
