<?php

namespace OnCloud\Dinero;

class PurchaseVoucherCreditPayments
{
    /**
     * Get payments for a credit purchase voucher or credit note
     *
     * @param string $id
     * @return mixed
     */
    public function get(string $id)
    {
        return Dinero::client()
            ->get('/purchase-vouchers/' . $id . '/payments')
            ->json();
    }

    /**
     * Create payment for credit purchase voucher or credit note
     *
     * @param string $id
     * @param int $amount
     * @param string $depositAccountNumber
     * @param string $description
     * @param string $timestamp
     * @param string|null $externalReference
     * @param string|null $paymentDate
     * @param int|null $amountInForeignCurrency
     * @return mixed
     */
    public function create(string $id, int $amount, string $depositAccountNumber, string $description, string $timestamp,
                           string $externalReference = null, string $paymentDate = null, int $amountInForeignCurrency = null)
    {
        return Dinero::client()
            ->post('/purchase-vouchers/' . $id . '/payments', [
                'amount' => $amount,
                'depositAccountNumber' => $depositAccountNumber,
                'description' => $description,
                'timestamp' => $timestamp,
                'externalReference' => $externalReference,
                'paymentDate' => $paymentDate,
                'amountInForeignCurrency' => $amountInForeignCurrency,
            ])
            ->json();
    }

    /**
     * Delete payment from credit purchase voucher or credit note
     *
     * @param string $id
     * @param string $paymentId
     * @param string $timestamp
     * @return mixed
     */
    public function delete(string $id, string $paymentId, string $timestamp)
    {
        return Dinero::client()
            ->delete('/purchase-vouchers/' . $id . '/payments/' . $paymentId, [
                'timestamp' => $timestamp,
            ])
            ->json();
    }
}
