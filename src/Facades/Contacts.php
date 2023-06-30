<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class Contacts extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\Contacts::class;
    }
}
