<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class LedgerItems extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\LedgerItems::class;
    }
}
