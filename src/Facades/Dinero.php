<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \OnCloud\Dinero\Dinero
 */
class Dinero extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\Dinero::class;
    }
}
