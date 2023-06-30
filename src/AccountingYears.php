<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class AccountingYears
{
    public function get()
    {
        return Dinero::client()
            ->get('/accountingyears')
            ->json();
    }
}
