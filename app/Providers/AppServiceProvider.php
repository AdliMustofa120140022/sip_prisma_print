<?php

namespace App\Providers;

use App\View\Components\faqSidebar;
use App\View\Components\productSidebar;
use App\View\Components\userNavbar;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
    public function boot(): void
    {
        //
        Paginator::useBootstrap();
        Blade::component('user-navbar', userNavbar::class);
        Blade::component('product-sidebar', productSidebar::class);
        Blade::component('faq-sidebar', faqSidebar::class);
    }
}
