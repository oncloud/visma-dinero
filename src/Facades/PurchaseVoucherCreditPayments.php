<?php

namespace OnCloud\Dinero\Facades;

use Illuminate\Support\Facades\Facade;

class PurchaseVoucherCreditPayments extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnCloud\Dinero\PurchaseVoucherCreditPayments::class;
    }
}
