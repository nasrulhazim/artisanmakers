<?php

namespace NasrulHazim\ArtisanMakers\Console\Commands;

use Illuminate\Console\Command;

class EventListener extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:eventlistener {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Event and Listener';

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
        $name = $this->argument('name');
        $this->call('make:event', [
            'name' => $name . 'Event',
        ]);
        $this->call('make:listener',
            [
                'name' => $name . 'Listener',
                '-e'   => $name . 'Event',
            ]
        );
    }
}
