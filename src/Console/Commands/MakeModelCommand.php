<?php

namespace NasrulHazim\ArtisanMakers\Console\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as ModelCommand;

class MakeModelCommand extends ModelCommand
{
    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\Models';
    }
}
