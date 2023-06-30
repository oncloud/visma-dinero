<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class Reports extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\Reports::class;
    }
}
