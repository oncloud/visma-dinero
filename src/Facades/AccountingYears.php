<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class AccountingYears extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\AccountingYears::class;
    }
}
