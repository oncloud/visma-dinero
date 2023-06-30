<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class Products extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\Products::class;
    }
}
