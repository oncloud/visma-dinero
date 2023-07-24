<?php

namespace OnCloud\Dinero;

class ManuelVouchers
{
    /**
     * Create manual voucher. Creates a manual voucher draft.
     *
     * @param string|null $date
     * @param array|null $lines
     * @param string|null $fileGuid
     * @param string|null $externalReference
     * @return mixed
     */
    public function create(string $date = null, array $lines = null, string $fileGuid = null, string $externalReference = null)
    {
        return Dinero::client()
            ->post('/vouchers/manual', [
                'date' => $date,
                'lines' => $lines,
                'fileGuid' => $fileGuid,
                'externalReference' => $externalReference
            ])
            ->json();
    }

    /**
     * Get manual voucher. Gets details of a specific manual voucher.
     *
     * @param string $guid
     * @return array|mixed
     */
    public function get(string $guid)
    {
        return Dinero::client()
            ->get('/vouchers/manual/' . $guid)
            ->json();
    }

    /**
     * Update manual voucher. Updates a manual voucher.
     *
     * @param string $guid
     * @param string $timestamp
     * @param string|null $voucherDate
     * @param array|null $lines
     * @param string|null $fileGuid
     * @param string|null $externalReference
     * @return array|mixed
     */
    public function update(string $guid, string $timestamp, string $voucherDate = null, array $lines = null,
                           string $fileGuid = null, string $externalReference = null)
    {
        return Dinero::client()
            ->put('/vouchers/manual/' . $guid, [
                'timestamp' => $timestamp,
                'voucherDate' => $voucherDate,
                'lines' => $lines,
                'fileGuid' => $fileGuid,
                'externalReference' => $externalReference
            ])
            ->json();
    }

    /**
     * Delete manual voucher. Deletes a manual voucher.
     *
     * @param string $guid
     * @param string $timestamp
     * @return array|mixed
     */
    public function delete(string $guid, string $timestamp)
    {
        return Dinero::client()
            ->delete('/vouchers/manual/' . $guid, [
                'timestamp' => $timestamp
            ])
            ->json();
    }

    /**
     * Book manual voucher. Books a manual voucher.
     *
     * @param string $guid
     * @param string $timestamp
     * @param string|null $number
     * @return array|mixed
     */
    public function book(string $guid, string $timestamp, string $number = null)
    {
        return Dinero::client()
            ->post('/vouchers/manual/' . $guid . '/book', [
                'number' => $number,
                'timestamp' => $timestamp
            ])
            ->json();
    }
}
