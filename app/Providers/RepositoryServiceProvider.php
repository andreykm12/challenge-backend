<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\PropertyRepository;
use App\Repositories\AnalyticTypeRepository;
use App\Repositories\PropertyRepositoryEloquent;
use App\Repositories\PropertyAnalyticRepository;
use App\Repositories\AnalyticTypeRepositoryEloquent;
use App\Repositories\PropertyAnalyticRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind(PropertyRepository::class, PropertyRepositoryEloquent::class);
        $this->app->bind(AnalyticTypeRepository::class, AnalyticTypeRepositoryEloquent::class);
        $this->app->bind(PropertyAnalyticRepository::class, PropertyAnalyticRepositoryEloquent::class);
    }
}
