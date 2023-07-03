<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class Countries
{
    /**
     * List countries. Get the list of countries.
     */
    public function get()
    {
        return Dinero::client()
            ->get('/countries')
            ->json();
    }
}
