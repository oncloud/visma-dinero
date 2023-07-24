<?php

namespace OnCloud\Dinero;

class PurchaseVoucherCreditPayments
{
    /**
     * Get payments for a credit purchase voucher or credit note
     *
     * @return mixed
     */
    public function get(string $id)
    {
        return Dinero::client()
            ->get('/purchase-vouchers/'.$id.'/payments')
            ->json();
    }

    /**
     * Create payment for credit purchase voucher or credit note
     *
     * @return mixed
     */
    public function create(string $id, int $amount, string $depositAccountNumber, string $description, string $timestamp,
        string $externalReference = null, string $paymentDate = null, int $amountInForeignCurrency = null)
    {
        return Dinero::client()
            ->post('/purchase-vouchers/'.$id.'/payments', [
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
     * @return mixed
     */
    public function delete(string $id, string $paymentId, string $timestamp)
    {
        return Dinero::client()
            ->delete('/purchase-vouchers/'.$id.'/payments/'.$paymentId, [
                'timestamp' => $timestamp,
            ])
            ->json();
    }
}
