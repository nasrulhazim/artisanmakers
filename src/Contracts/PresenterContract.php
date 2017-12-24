<?php

namespace NasrulHazim\ArtisanMakers\Contracts;

/**
 * All Presenters should implement this contract
 */
interface PresenterContract
{
    public static function present(...$args);
}
