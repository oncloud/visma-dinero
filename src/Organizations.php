<?php

namespace OnCloud\Dinero;

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
