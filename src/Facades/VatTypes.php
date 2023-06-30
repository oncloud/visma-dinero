<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class VatTypes extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\VatTypes::class;
    }
}
