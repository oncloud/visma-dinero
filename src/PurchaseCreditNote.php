<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class PurchaseCreditNote
{
    /**
     * Create purchase credit note. Creates a new purchase credit note draft.
     *
     * @return mixed
     */
    public function create(array $lines, string $guid = null, string $creditNoteFor = null, string $fileGuid = null,
        string $contactGuid = null, string $date = null, string $currency = null)
    {
        return Dinero::client()
            ->post('/vouchers/purchase/creditnotes', [
                'lines' => $lines,
                'guid' => $guid,
                'creditNoteFor' => $creditNoteFor,
                'fileGuid' => $fileGuid,
                'contactGuid' => $contactGuid,
                'date' => $date,
                'currency' => $currency,
            ])
            ->json();
    }

    /**
     * Get purchase credit note. Gets a purchase credit note by its guid.
     *
     * @return mixed
     */
    public function get(string $guid)
    {
        return Dinero::client()
            ->get('/vouchers/purchase/creditnotes/'.$guid)
            ->json();
    }

    /**
     * Update purchase credit note. Update a purchase credit note draft.
     *
     * @return mixed
     */
    public function update(string $guid, array $lines, string $timestamp, string $creditNoteFor = null, string $fileGuid = null,
        string $contactGuid = null, string $date = null, string $currency = null)
    {
        return Dinero::client()
            ->put('/vouchers/purchase/creditnotes/'.$guid, [
                'lines' => $lines,
                'timestamp' => $timestamp,
                'creditNoteFor' => $creditNoteFor,
                'fileGuid' => $fileGuid,
                'contactGuid' => $contactGuid,
                'date' => $date,
                'currency' => $currency,
            ])
            ->json();
    }

    /**
     * Delete purchase credit note. Delete a purchase credit note.
     *
     * @return mixed
     */
    public function delete(string $guid, string $timestamp = null)
    {
        return Dinero::client()
            ->delete('/vouchers/purchase/creditnotes/'.$guid, [
                'timestamp' => $timestamp,
            ])
            ->json();
    }

    /**
     * Book purchase credit note. Book purchase credit note.
     *
     * @return array|mixed
     */
    public function book(string $guid, string $timestamp, string $number = null)
    {
        return Dinero::client()
            ->post('/vouchers/purchase/creditnotes/'.$guid.'/book', [
                'timestamp' => $timestamp,
                'number' => $number,
            ])
            ->json();
    }
}
