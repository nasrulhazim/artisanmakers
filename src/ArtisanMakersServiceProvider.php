<?php

namespace NasrulHazim\ArtisanMakers;

use Illuminate\Support\ServiceProvider;
use NasrulHazim\ArtisanMakers\Console\Commands\Clear\Cache;
use NasrulHazim\ArtisanMakers\Console\Commands\Clear\Log;
use NasrulHazim\ArtisanMakers\Console\Commands\Database\Setup;
use NasrulHazim\ArtisanMakers\Console\Commands\InstallCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakeContractCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakeExceptionCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakeModelCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakeObserverCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakePresenterCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakeProcessorCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakeServiceCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakeTraitCommand;
use NasrulHazim\ArtisanMakers\Console\Commands\MakeTransformerCommand;
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
            Cache::class,
            Log::class,
            Setup::class,
            InstallCommand::class,
            MakeContractCommand::class,
            MakeExceptionCommand::class,
            MakeModelCommand::class,
            MakeObserverCommand::class,
            MakePresenterCommand::class,
            MakeProcessorCommand::class,
            // MakeResourcefulControllerCommand::class,
            // MakeScaffoldCommand::class,
            MakeServiceCommand::class,
            MakeTraitCommand::class,
            MakeTransformerCommand::class,
            // MakeViewCommand::class,
            Cookie::class,
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
