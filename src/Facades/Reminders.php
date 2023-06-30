<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class Reminders extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\Reminders::class;
    }
}
