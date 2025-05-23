<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class LedgerItems
{
    /**
     * Get ledger items.
     *
     * @return mixed
     */
    public function get(string $id, ?string $version = null)
    {
        return Dinero::client()
            ->post('/ledgeritems/ledgers/', [
                'id' => $id,
                'version' => $version,
            ])
            ->json();
    }

    /**
     * Add ledger item. Add a new ledger item to the ledger. The maximum number of ledger items in the ledger is 1000.
     *
     * @return mixed
     */
    public function add(?string $id = null, ?string $version = null, ?int $voucherNumber = null, ?string $voucherDate = null, ?string $fileGuid = null, array $lines = [])
    {
        return Dinero::client('v1.2')
            ->post('/ledgeritems/', [
                'id' => $id,
                'version' => $version,
                'voucherNumber' => $voucherNumber,
                'voucherDate' => $voucherDate,
                'fileGuid' => $fileGuid,
                'lines' => $lines,
            ])
            ->json();
    }

    /**
     * Update ledger items. Update a ledger item to the ledger. It is required to send version and id for each ledger item.
     *
     * @return mixed
     */
    public function update(?string $id = null, ?string $version = null, ?int $voucherNumber = null, ?string $voucherDate = null, ?string $fileGuid = null, array $lines = [])
    {
        return Dinero::client()
            ->put('/ledgeritems/', [
                'id' => $id,
                'version' => $version,
                'voucherNumber' => $voucherNumber,
                'voucherDate' => $voucherDate,
                'fileGuid' => $fileGuid,
                'lines' => $lines,
            ])
            ->json();
    }

    /**
     * Send ledger itmes to booking. Starting the asynchronous booking process. The ongoing status can be fetch from the
     * status endpoint.
     *
     * @return array|mixed
     */
    public function book(string $id, ?string $version = null)
    {
        return Dinero::client()
            ->post('/ledgeritems/book/', [
                'id' => $id,
                'version' => $version,
            ])
            ->json();
    }

    /**
     * Get ledger item status. Get status for ledger items sent to booking.
     *
     * @return array|mixed
     */
    public function status(string $id)
    {
        return Dinero::client()
            ->post('/ledgeritems/status/', [
                'id' => $id,
            ])
            ->json();
    }

    /**
     * Delete multiple ledger items. Deletes a list of ledger items.
     *
     * @return array|mixed
     */
    public function delete(string $id, ?string $version = null)
    {
        return Dinero::client()
            ->delete('/ledgeritems/delete', [
                'id' => $id,
                'version' => $version,
            ])
            ->json();
    }
}
