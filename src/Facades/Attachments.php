<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class Attachments extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\Attachments::class;
    }
}
