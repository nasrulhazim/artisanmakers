<?php

namespace NasrulHazim\ArtisanMakers\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use NasrulHazim\ArtisanMakers\Traits\CommandTrait;
use Symfony\Component\Console\Input\InputOption;

class MakeObserverCommand extends GeneratorCommand
{
    use CommandTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:observer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Observer class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Observer';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/observer.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\Observers';
    }

    /**
     * Build the class with the given name.
     *
     * Remove the base controller import if we are already in base namespace.
     *
     * @todo Register ObserverServiceProvider in config/app.php, if not yet
     * @todo Include model & observer namespace in ObserverServiceProvider
     * @todo Bootstrap Observer in ObserverServiceProvider
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        if ($this->option('model')) {
            $replace = $obvserverReplace = [];

            $replace = $obvserverReplace = $this->buildModelReplacements($replace);

            return str_replace(
                array_keys($replace), array_values($replace), parent::buildClass($name)
            );
        } else {
            return parent::buildClass($name);
        }
    }

    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function handle()
    {
        $this->registerObserverServiceProvider();

        parent::handle();

        $this->info('Please include model and observer namespace in ObserverServiceProvider');
        $this->info('Then bootstrap Observer in ObserverServiceProvider in boot() method like the following:');
        $this->comment('User::observe(ObserveUser::class);');
    }

    /**
     * Register Observer Service Provider
     * @void
     */
    public function registerObserverServiceProvider()
    {
        if (!$this->files->exists(app_path('Providers/ObserverServiceProvider.php'))) {
            $this->call('make:provider', [
                'name' => 'ObserverServiceProvider',
            ]);
            $this->info('Please register your ObserverServiceProvider in config/app.php.');
            $this->comment('Do run php artisan config:cache to make sure ObserverServiceProvider is loaded.');
        }
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['model', 'm', InputOption::VALUE_OPTIONAL, 'Generate an observer for the given model.'],
        ];
    }
}
