<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class Webhooks extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\Webhooks::class;
    }
}
