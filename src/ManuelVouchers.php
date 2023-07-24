<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class ManuelVouchers
{
    /**
     * Create manual voucher. Creates a manual voucher draft.
     *
     * @return mixed
     */
    public function create(string $date = null, array $lines = null, string $fileGuid = null, string $externalReference = null)
    {
        return Dinero::client()
            ->post('/vouchers/manual', [
                'date' => $date,
                'lines' => $lines,
                'fileGuid' => $fileGuid,
                'externalReference' => $externalReference,
            ])
            ->json();
    }

    /**
     * Get manual voucher. Gets details of a specific manual voucher.
     *
     * @return array|mixed
     */
    public function get(string $guid)
    {
        return Dinero::client()
            ->get('/vouchers/manual/'.$guid)
            ->json();
    }

    /**
     * Update manual voucher. Updates a manual voucher.
     *
     * @return array|mixed
     */
    public function update(string $guid, string $timestamp, string $voucherDate = null, array $lines = null,
        string $fileGuid = null, string $externalReference = null)
    {
        return Dinero::client()
            ->put('/vouchers/manual/'.$guid, [
                'timestamp' => $timestamp,
                'voucherDate' => $voucherDate,
                'lines' => $lines,
                'fileGuid' => $fileGuid,
                'externalReference' => $externalReference,
            ])
            ->json();
    }

    /**
     * Delete manual voucher. Deletes a manual voucher.
     *
     * @return array|mixed
     */
    public function delete(string $guid, string $timestamp)
    {
        return Dinero::client()
            ->delete('/vouchers/manual/'.$guid, [
                'timestamp' => $timestamp,
            ])
            ->json();
    }

    /**
     * Book manual voucher. Books a manual voucher.
     *
     * @return array|mixed
     */
    public function book(string $guid, string $timestamp, string $number = null)
    {
        return Dinero::client()
            ->post('/vouchers/manual/'.$guid.'/book', [
                'number' => $number,
                'timestamp' => $timestamp,
            ])
            ->json();
    }
}
