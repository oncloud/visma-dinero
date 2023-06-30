<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class ManuelVouchers extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\ManuelVouchers::class;
    }
}
