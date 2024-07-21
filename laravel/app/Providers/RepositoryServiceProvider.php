<?php

namespace App\Providers;

use App\Repositories\Eloquent\ActivationEloquent;
use App\Repositories\Eloquent\ActivityLogEloquent;
use App\Repositories\Eloquent\BusinessEloquent;
use App\Repositories\Eloquent\UserEloquent;
use App\Repositories\Interfaces\ActivationInterface;
use App\Repositories\Interfaces\ActivityLogInterface;
use App\Repositories\Interfaces\BusinessInterface;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserEloquent::class);
        $this->app->bind(ActivationInterface::class, ActivationEloquent::class);
        $this->app->bind(ActivityLogInterface::class, ActivityLogEloquent::class);
        $this->app->bind(BusinessInterface::class, BusinessEloquent::class);
    }
}
