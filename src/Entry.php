<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class Entry
{
    /**
     * List entries. Get a list of Entries for a given period.
     */
    public function list(?string $fromDate = null, ?string $toDate = null, ?string $includePrimo = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'fromDate' => $fromDate,
                'toDate' => $toDate,
                'includePrimo' => $includePrimo,
            ])
            ->get('/entries')
            ->json();
    }

    /**
     * List changes. Get a list of Entries added in a given time range, the range connot be longer than 31 days. Primo
     * entries will be returned if they have been updated in the time range. The value of the primo entry will be the
     * current total for that account and accounting year, not the changes made in the time range. The guid of a primo
     * entry will be the same for a given pair of an account and an accounting year, i.e. the guid of a primo entry on
     * account 2000 in 2018 will never change, but the value might be updated.
     */
    public function listChanges(?string $fromDate = null, ?string $toDate = null, ?string $includePrimo = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'fromDate' => $fromDate,
                'toDate' => $toDate,
                'includePrimo' => $includePrimo,
            ])
            ->get('/entries/changes')
            ->json();
    }
}
