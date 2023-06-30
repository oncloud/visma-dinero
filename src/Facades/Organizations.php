<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class Organizations extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\Organizations::class;
    }
}
