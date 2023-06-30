<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class Accounts extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\Accounts::class;
    }
}
