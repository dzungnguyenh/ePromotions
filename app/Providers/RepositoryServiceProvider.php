<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use App\Repositories\Point\PointRepository;
use App\Repositories\Point\PointRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(PointRepositoryInterface::class, PointRepository::class);
    }
}
