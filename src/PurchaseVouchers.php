<?php

namespace OnCloud\Dinero;

class PurchaseVouchers
{
    /**
     * Create purchase voucher. Creates a new purchase voucher draft.
     *
     * @param string $purchaseType
     * @param array $lines
     * @param string|null $voucherDate
     * @param int|null $depositAccountNumber
     * @param string|null $regionKey
     * @param string|null $fileGuid
     * @param string|null $contactGuid
     * @param string|null $paymentDate
     * @param string|null $currencyKey
     * @param string|null $externalReference
     * @return mixed
     */
    public function create(string $purchaseType, array $lines, string $voucherDate = null, int $depositAccountNumber = null,
                           string $regionKey = null, string $fileGuid = null, string $contactGuid = null, string $paymentDate = null,
                           string $currencyKey = null, string $externalReference = null)
    {
        return Dinero::client('v1.2')
            ->post('/vouchers/purchase/' . $purchaseType, [
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
     * @param string $purchaseType
     * @param array $lines
     * @param string|null $voucherDate
     * @param int|null $depositAccountNumber
     * @param string|null $regionKey
     * @param string|null $fileGuid
     * @param string|null $contactGuid
     * @param string|null $paymentDate
     * @param string|null $currencyKey
     * @param string|null $externalReference
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
     * @param string $purchaseType
     * @param array $lines
     * @param string|null $voucherDate
     * @param int|null $depositAccountNumber
     * @param string|null $regionKey
     * @param string|null $fileGuid
     * @param string|null $contactGuid
     * @param string|null $paymentDate
     * @param string|null $currencyKey
     * @param string|null $externalReference
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
     * @param string $guid
     * @return mixed
     */
    public function get(string $guid)
    {
        return Dinero::client()
            ->get('/vouchers/purchase/' . $guid)
            ->json();
    }

    /**
     * Update purchase voucher. Update a purchase voucher draft, you cannot update a booked purchase vouchers.
     *
     * @param string $guid
     * @param array $lines
     * @param string $voucherDate
     * @param string $timestamp
     * @param string $contactGuid
     * @param string $purchaseType
     * @param int|null $depositAccountNumber
     * @param string|null $regionKey
     * @param string|null $fileGuid
     * @param string|null $paymentDate
     * @param string|null $currencyKey
     * @param string|null $externalReference
     * @return mixed
     */
    public function update(string $guid, array $lines, string $voucherDate, string $timestamp, string $contactGuid, string $purchaseType,
                           int $depositAccountNumber = null, string $regionKey = null, string $fileGuid = null, string $paymentDate = null,
                           string $currencyKey = null, string $externalReference = null)
    {
        return Dinero::client('v1.1')
            ->put('/vouchers/purchase/' . $guid, [
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
     * @param string $guid
     * @param string|null $timestamp
     * @return mixed
     */
    public function delete(string $guid, string $timestamp = null)
    {
        return Dinero::client()
            ->delete('/vouchers/purchase/' . $guid, [
                'timestamp' => $timestamp,
            ])
            ->json();
    }

    /**
     * Get purchase draft Guid by fileGuid. Gets a purchase draft Guid by fileGuid.
     *
     * @param string $fileGuid
     * @return mixed
     */
    public function getDraftGuidByFileGuid(string $fileGuid)
    {
        return Dinero::client()
            ->get('/vouchers/purchase/fileguid/' . $fileGuid)
            ->json();
    }

    /**
     * Book purchase voucher. Book a purchase voucher.
     *
     * @param string $guid
     * @param string $timestamp
     * @param int|null $number
     * @return mixed
     */
    public function book(string $guid, string $timestamp, int $number = null)
    {
        return Dinero::client()
            ->post('/vouchers/purchase/' . $guid . '/book', [
                'timestamp' => $timestamp,
                'number' => $number,
            ])
            ->json();
    }

    /**
     * Create credit note from purchase voucher. Generate and save a credit note draft of a given booked purchase voucher.
     *
     * @param string $guid
     * @param string $timestamp
     * @param string|null $voucherDate
     * @param string|null $fileGuid
     * @return mixed
     */
    public function creditNote(string $guid, string $timestamp, string $voucherDate = null, string $fileGuid = null)
    {
        return Dinero::client()
            ->post('/vouchers/purchase/' . $guid . '/generate-creditnote', [
                'timestamp' => $timestamp,
                'voucherDate' => $voucherDate,
                'fileGuid' => $fileGuid,
            ])
            ->json();
    }
}
