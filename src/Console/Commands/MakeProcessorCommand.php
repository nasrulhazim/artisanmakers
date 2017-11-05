<?php

namespace NasrulHazim\ArtisanMakers\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeProcessorCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:processor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new processor class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Processor';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/processor.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\Processors';
    }
}
