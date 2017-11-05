<?php

namespace NasrulHazim\ArtisanMakers\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Artisan Makers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // install contracts
        // all common usage
    }
}
