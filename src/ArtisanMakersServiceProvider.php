<?php

namespace Nasrulhazim\ArtisanMakers;

use Illuminate\Support\ServiceProvider;

class ArtisanMakersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $commands = [];

        // commands available on console and web app
        $commands[] = \NasrulHazim\ArtisanMakers\Console\Commands\Clear\Cache::class;
        $commands[] = \NasrulHazim\ArtisanMakers\Console\Commands\InstallCommand::class;

        // register commands only when application is running in console mode
        if ($this->app->runningInConsole()) {

            // register all commands that can be use during local, staging and production
            // $commands[] = \NasrulHazim\ArtisanMakers\Console\Commands\Clear\Cache::class;

            // register commands that running on local and staging
            if ($this->app->environment('local', 'staging')) {
                $commands[] = \NasrulHazim\ArtisanMakers\Console\Commands\Clear\Cache::class;
                $commands[] = \NasrulHazim\ArtisanMakers\Console\Commands\Clear\Serve::class;
                $commands[] = \NasrulHazim\ArtisanMakers\Console\Commands\Clear\Log::class;
                $commands[] = \NasrulHazim\ArtisanMakers\Console\Commands\Database\Setup::class;
                $commands[] = \NasrulHazim\ArtisanMakers\Console\Commands\Secure\Cookie::class;
                $commands[] = \NasrulHazim\ArtisanMakers\Console\Commands\Common::class;
                $commands[] = \NasrulHazim\ArtisanMakers\Console\Commands\EventListener::class;
                $commands[] = \NasrulHazim\ArtisanMakers\Console\Commands\Route::class;
                $commands[] = \NasrulHazim\ArtisanMakers\Console\Commands\View::class;
                $commands[] = \NasrulHazim\ArtisanMakers\Console\Commands\Controller::class;
                $commands[] = \NasrulHazim\ArtisanMakers\Console\Commands\Scaffold::class;
            }

            $this->commands($commands);
        }

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
