<?php

namespace NasrulHazim\ArtisanMakers\Console\Commands;

use Illuminate\Console\Command;

class Common extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:common {model*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Model, Migration, Resourceful Controller, Route and Request';

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
        $models = $this->arguments('model')['model'];
        $routes = [];
        foreach ($models as $key => $value) {
            $value = str_singular(studly_case($value));
            $this->call('make:model',
                [
                    'name' => $value,
                    '-c'   => true,
                    '-m'   => true,
                    '-r'   => true,
                ]
            );
            $this->call('make:route', [
                'name' => $value,
            ]);
            $this->call('make:request', [
                'name' => $value . 'Request',
            ]);
            $this->call('make:seeder', [
                'name' => $value . 'TableSeeder',
            ]);
            $this->call('make:eventlistener', [
                'name' => $value,
            ]);
        }
    }
}
