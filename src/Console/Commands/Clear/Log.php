<?php

namespace NasrulHazim\ArtisanMakers\Console\Commands\Clear;

use Illuminate\Console\Command;

class Log extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear laravel.log';

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
        shell_exec('cat /dev/null > storage/logs/laravel.log');
    }
}
