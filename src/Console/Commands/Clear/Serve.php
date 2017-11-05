<?php

namespace NasrulHazim\ArtisanMakers\Console\Commands\Clear;

use Illuminate\Console\Command;

class Serve extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:serve {--port=8000}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all caches and serve the application';

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
        $this->call('clear:cache');
        $this->call('serve', ['--port' => $this->option('port')]);
    }
}
