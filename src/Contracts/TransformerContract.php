<?php

namespace NasrulHazim\ArtisanMakers\Contracts;

/**
 * All Transformers should implement this contract
 */
interface TransformerContract
{
    public static function make();
    public function transform($object);
}
