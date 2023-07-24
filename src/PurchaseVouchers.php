<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class PurchaseVouchers
{
    /**
     * Create purchase voucher. Creates a new purchase voucher draft.
     *
     * @return mixed
     */
    public function create(string $purchaseType, array $lines, string $voucherDate = null, int $depositAccountNumber = null,
        string $regionKey = null, string $fileGuid = null, string $contactGuid = null, string $paymentDate = null,
        string $currencyKey = null, string $externalReference = null)
    {
        return Dinero::client('v1.2')
            ->post('/vouchers/purchase/'.$purchaseType, [
                'lines' => $lines,
                'voucherDate' => $voucherDate,
                'depositAccountNumber' => $depositAccountNumber,
                'regionKey' => $regionKey,
                'fileGuid' => $fileGuid,
                'contactGuid' => $contactGuid,
                'paymentDate' => $paymentDate,
                'currencyKey' => $currencyKey,
                'externalReference' => $externalReference,
            ])
            ->json();
    }

    /**
     * Get purchase totals. Fetch a purchase to get totals.
     *
     * @return mixed
     */
    public function getTotals(string $purchaseType, array $lines, string $voucherDate = null, int $depositAccountNumber = null,
        string $regionKey = null, string $fileGuid = null, string $contactGuid = null, string $paymentDate = null,
        string $currencyKey = null, string $externalReference = null)
    {
        return Dinero::client()
            ->post('/vouchers/purchase/fetch', [
                'lines' => $lines,
                'voucherDate' => $voucherDate,
                'depositAccountNumber' => $depositAccountNumber,
                'regionKey' => $regionKey,
                'fileGuid' => $fileGuid,
                'contactGuid' => $contactGuid,
                'paymentDate' => $paymentDate,
                'currencyKey' => $currencyKey,
                'externalReference' => $externalReference,
            ])
            ->json();
    }

    /**
     * Get similar purchase. Looks for similar purchase.
     *
     * @return mixed
     */
    public function getSimilar(string $purchaseType, array $lines, string $voucherDate = null, int $depositAccountNumber = null,
        string $regionKey = null, string $fileGuid = null, string $contactGuid = null, string $paymentDate = null,
        string $currencyKey = null, string $externalReference = null)
    {
        return Dinero::client()
            ->post('/vouchers/purchase/similar', [
                'lines' => $lines,
                'voucherDate' => $voucherDate,
                'depositAccountNumber' => $depositAccountNumber,
                'regionKey' => $regionKey,
                'fileGuid' => $fileGuid,
                'contactGuid' => $contactGuid,
                'paymentDate' => $paymentDate,
                'currencyKey' => $currencyKey,
                'externalReference' => $externalReference,
            ])
            ->json();
    }

    /**
     * Get purchase voucher. Gets a purchase voucher by its guid.
     *
     * @return mixed
     */
    public function get(string $guid)
    {
        return Dinero::client()
            ->get('/vouchers/purchase/'.$guid)
            ->json();
    }

    /**
     * Update purchase voucher. Update a purchase voucher draft, you cannot update a booked purchase vouchers.
     *
     * @return mixed
     */
    public function update(string $guid, array $lines, string $voucherDate, string $timestamp, string $contactGuid, string $purchaseType,
        int $depositAccountNumber = null, string $regionKey = null, string $fileGuid = null, string $paymentDate = null,
        string $currencyKey = null, string $externalReference = null)
    {
        return Dinero::client('v1.1')
            ->put('/vouchers/purchase/'.$guid, [
                'lines' => $lines,
                'voucherDate' => $voucherDate,
                'timestamp' => $timestamp,
                'contactGuid' => $contactGuid,
                'purchaseType' => $purchaseType,
                'depositAccountNumber' => $depositAccountNumber,
                'regionKey' => $regionKey,
                'fileGuid' => $fileGuid,
                'paymentDate' => $paymentDate,
                'currencyKey' => $currencyKey,
                'externalReference' => $externalReference,
            ])
            ->json();
    }

    /**
     * Delete purchase voucher. Delete a purchase voucher.
     *
     * @return mixed
     */
    public function delete(string $guid, string $timestamp = null)
    {
        return Dinero::client()
            ->delete('/vouchers/purchase/'.$guid, [
                'timestamp' => $timestamp,
            ])
            ->json();
    }

    /**
     * Get purchase draft Guid by fileGuid. Gets a purchase draft Guid by fileGuid.
     *
     * @return mixed
     */
    public function getDraftGuidByFileGuid(string $fileGuid)
    {
        return Dinero::client()
            ->get('/vouchers/purchase/fileguid/'.$fileGuid)
            ->json();
    }

    /**
     * Book purchase voucher. Book a purchase voucher.
     *
     * @return mixed
     */
    public function book(string $guid, string $timestamp, int $number = null)
    {
        return Dinero::client()
            ->post('/vouchers/purchase/'.$guid.'/book', [
                'timestamp' => $timestamp,
                'number' => $number,
            ])
            ->json();
    }

    /**
     * Create credit note from purchase voucher. Generate and save a credit note draft of a given booked purchase voucher.
     *
     * @return mixed
     */
    public function creditNote(string $guid, string $timestamp, string $voucherDate = null, string $fileGuid = null)
    {
        return Dinero::client()
            ->post('/vouchers/purchase/'.$guid.'/generate-creditnote', [
                'timestamp' => $timestamp,
                'voucherDate' => $voucherDate,
                'fileGuid' => $fileGuid,
            ])
            ->json();
    }
}
