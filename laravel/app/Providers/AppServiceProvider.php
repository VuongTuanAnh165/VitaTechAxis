<?php

namespace App\Providers;

use App\Models\Business;
use App\Repositories\Interfaces\BusinessInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('layouts.header', function ($view) {
            $business = Business::first();
            return $view->with([
                'business' => $business,
            ]);
        });
        View::composer('layouts.master', function ($view) {
            $business = Business::first();
            return $view->with([
                'business' => $business,
            ]);
        });

        //fix bug 1071 connect MySql
        Schema::defaultStringLength(191);
    }
}
