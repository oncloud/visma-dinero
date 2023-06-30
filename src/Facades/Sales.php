<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class Sales extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\Sales::class;
    }
}
