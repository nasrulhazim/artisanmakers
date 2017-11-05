<?php

namespace NasrulHazim\ArtisanMakers\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class Controller extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:resourceful';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new resourceful controller class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Resourceful Controller';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/controller.resourceful.stub';
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name) . '\\', '', $name);
        $model = str_replace('Controller', '', $class);
        $var   = Str::snake(Str::singular($model));
        $view  = Str::plural(Str::slug($model));
        $route = $view;

        return str_replace([
            'DummyClass',
            'DummyModel',
            'DummyVar',
            'DummyView',
            'DummyRoute',
        ], [
            $class,
            $model,
            $var,
            $view,
            $route,
        ], $stub);
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Controllers';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['crud', 'c', InputOption::VALUE_NONE, 'Generate a CRUD controller class.'],
            ['resource', 'r', InputOption::VALUE_NONE, 'Generate a resource controller class.'],
        ];
    }

    /**
     * Build the class with the given name.
     *
     * Remove the base controller import if we are already in base namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $namespace = $this->getNamespace($name);

        return str_replace("use {$namespace}\Controller;\n", '', parent::buildClass($name));
    }
}
