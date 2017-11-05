<?php

namespace NasrulHazim\ArtisanMakers\Console\Commands\Clear;

use Illuminate\Console\Command;

class Cache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all caches';

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
        $this->call('down');
        $this->call('clear-compiled');
        $this->call('view:clear');
        $this->call('config:cache');
        $this->call('optimize');
        $this->call('up');
    }
}
