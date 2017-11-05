<?php

namespace NasrulHazim\ArtisanMakers\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class View extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:view';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new view';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'View';

    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function fire()
    {
        $name = $this->getNameInput();
        $path = $this->getPath($name);
        $file = $path . '/' . $name . '.blade.php';
        if (!$this->option('r')) {
            if ($this->alreadyExists($file)) {
                $this->error($this->type . ' already exists!');
                return false;
            } else {
                if (!$this->alreadyExists($path)) {
                    $this->files->makeDirectory($path);
                }
            }
            $this->files->put($file, $this->buildClass($name));
        } else {
            if (!$this->alreadyExists($path)) {
                $this->files->makeDirectory($path);
            } else {
                $this->error($this->type . ' already exists!');
                return false;
            }
            $this->buildResouceful($path, $name);
        }

        $this->info($this->type . ' created successfully.');
    }

    private function buildResouceful($path, $name)
    {
        $stubs = [
            'index',
            'form',
            'show',
        ];

        foreach ($stubs as $key => $value) {
            $stub    = $this->files->get(__DIR__ . '/stubs/views/' . $value . '.stub');
            $content = $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
            $file    = $path . '/' . $value . '.blade.php';
            $this->files->put($file, $content);
        }
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        if ($this->option('r')) {
            $name = trim($this->argument('name'));
        } else {
            $explode = explode('.', trim($this->argument('name')));
            $name    = $explode[count($explode) - 1];
        }
        return Str::slug($name);
    }

    /**
     * Determine if the class already exists.
     *
     * @param  string  $name
     * @return bool
     */
    protected function alreadyExists($path)
    {
        return $this->files->exists($path);
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $path = str_replace(['.', $name], ['', ''], $this->argument('name'));
        if ($this->option('r')) {
            $path .= $name;
        }
        return resource_path('views/' . $path);
    }

    /**
     * Get the class name
     * @param  string $name
     * @return string
     */
    protected function getClassName($name)
    {
        return str_replace($this->getNamespace($name) . '\\', '', $name);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/views/plain.stub';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['r', 'r', InputOption::VALUE_NONE, 'Create a new resourceful views'],
            ['p', 'p', InputOption::VALUE_OPTIONAL, 'Set view\' parent'],
        ];
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
        return str_replace([
            'layouts.app',
            'DummyRoute',
            'DummyResource',
        ], [
            'layouts.' . ($this->option('p') ? $this->option('p') : 'app'),
            Str::plural(Str::slug($name)),
            Str::plural($this->getClassName($name)),
        ], $stub);
    }
}
