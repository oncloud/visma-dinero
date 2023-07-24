<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class Organizations
{
    /**
     * List organization. Gets a list of the users' organizations.
     *
     * @return mixed
     */
    public function list()
    {
        return Dinero::client()
            ->get('/organizations')
            ->json();
    }
}
