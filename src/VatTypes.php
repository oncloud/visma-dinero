<?php

namespace OnCloud\Dinero;

class VatTypes
{
    /**
     * List vat types. Gets a list of all of the organization's VAT types.
     *
     * @return mixed
     */
    public function list()
    {
        return Dinero::client()
            ->get('/vatTypes')
            ->json();
    }
}
