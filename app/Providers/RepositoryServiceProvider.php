<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use App\Repositories\Point\PointRepository;
use App\Repositories\Point\PointRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Book\BookRepository;
use App\Repositories\Book\BookRepositoryInterface;

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
        App::bind(UserRepositoryInterface::class, UserRepository::class);
        App::bind(BookRepositoryInterface::class, BookRepository::class);
        App::bind(BookDetailRepositoryInterface::class, BookDetailRepository::class);
    }
}
