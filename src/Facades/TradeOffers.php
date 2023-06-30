<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class TradeOffers extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\TradeOffers::class;
    }
}
