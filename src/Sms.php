<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class Sms
{
    /**
     * Send sms with link to invoice. SMS has special terms and usage will be invoiced. By using the Sms API you accept
     * the terms which can be found here: https://dinero.dk/sikkerhed/retningslinjer-og-vilkaar-for-api-partnere/
     *
     * @param string $voucherGuid
     * @param string $receiverPhoneNumber
     * @param string $receiverName
     * @param string $timestamp
     * @param string $isReminder
     * @param string $message
     * @return mixed
     */
    public function send($voucherGuid, $receiverPhoneNumber, $receiverName, $timestamp, $isReminder, $message)
    {
        return Dinero::client()
            ->post('/sms'.$voucherGuid.'/send-sms', [
                'voucherGuid' => $voucherGuid,
                'receiverPhoneNumber' => $receiverPhoneNumber,
                'receiverName' => $receiverName,
                'timestamp' => $timestamp,
                'isReminder' => $isReminder,
                'message' => $message,
            ])
            ->json();
    }

}
