<?php

namespace App\Providers;

use App\Interfaces\CountryRepositoryInterface;
use App\Interfaces\CountryServiceInretface;
use App\Interfaces\MovieRepositoryInterface;
use App\Interfaces\MovieReviewServiceInretface;
use App\Interfaces\MovieServiceInretface;
use App\Interfaces\MovieTypeRepositoryInterface;
use App\Interfaces\MovieTypeServiceInretface;
use App\Repositories\CountryRepository;
use App\Repositories\MovieRepository;
use App\Repositories\MovieTypeRepository;
use App\Services\CountryService;
use App\Services\MovieReviewService;
use App\Services\MovieService;
use App\Services\MovieTypeService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
        $this->app->bind(MovieTypeRepositoryInterface::class, MovieTypeRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(MovieReviewServiceInretface::class, MovieReviewService::class);

        $this->app->bind(MovieServiceInretface::class, MovieService::class);
        $this->app->bind(CountryServiceInretface::class, CountryService::class);
        $this->app->bind(MovieTypeServiceInretface::class, MovieTypeService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
