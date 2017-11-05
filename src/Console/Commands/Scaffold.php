<?php

namespace NasrulHazim\ArtisanMakers\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class Scaffold extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:scaffold {model*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Scaffold';

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
            $value = Str::singular(Str::studly($value));

            // Create a new model with migration script
            $this->call('make:model',
                [
                    'name' => $value,
                    '-m'   => true,
                ]
            );

            // Create a new route
            $this->call('make:route', [
                'name' => $value,
            ]);

            // // Create a resourceful controller
            $this->call('make:resourceful',
                [
                    'name' => $value . 'Controller',
                ]
            );

            // Create a seeder file
            $this->call('make:seeder', [
                'name' => $value . 'TableSeeder',
            ]);

            // Create a resourceful view
            $this->call('make:view', [
                'name' => Str::plural(Str::slug($value)),
                '-r'   => true,
            ]);
        }
    }
}
