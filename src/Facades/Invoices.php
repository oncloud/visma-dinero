<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class Invoices extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\Invoices::class;
    }
}
