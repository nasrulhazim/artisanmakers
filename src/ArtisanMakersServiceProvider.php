<?php

namespace NasrulHazim\ArtisanMakers;

use Illuminate\Support\ServiceProvider;
use NasrulHazim\ArtisanMakers\Console\Commands\Clear\Cache;
use NasrulHazim\ArtisanMakers\Console\Commands\Clear\Log;
use NasrulHazim\ArtisanMakers\Console\Commands\Database\Setup;
use NasrulHazim\ArtisanMakers\Console\Commands\InstallCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakeContractCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakeExceptionCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakePresenterCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakeResourcefulControllerCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakeScaffoldCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakeViewCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\Secure\Cookie;

class ArtisanMakersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            InstallCommand::class,
            Cache::class,
            Log::class,
            Setup::class,
            Cookie::class,
            MakeContractCommand::class,
            MakeExceptionCommand::class,
            MakePresenterCommand::class,
            MakeResourcefulControllerCommand::class,
            MakeScaffoldCommand::class,
            MakeViewCommand::class,
        ]);

        $this->publishes([
            dirname(__FILE__) . '/resources/views' => resource_path('views'),
        ], 'artisan-extended-views');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
