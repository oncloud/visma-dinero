<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class ContactStateOfAccount
{
    /**
     * Get the contacts state of account. Returns the income, expenses and related entries for a contact in the given
     * period (or all time if no period is defined).
     */
    public function get(string $guid, ?string $fromDate = null, ?string $toDate = null, ?string $hideClosed = null): mixed
    {
        return Dinero::client()
            ->withQueryParameters([
                'from' => $fromDate,
                'to' => $toDate,
                'hideClosed' => $hideClosed,
            ])
            ->get('/state-of-account/'.$guid)
            ->json();
    }

    /**
     * Get the contacts state of account as a PDF. Returns the income, expenses and related entries for a contact in the
     * given period (or all time if no period is defined).
     */
    public function getPdf(string $guid, ?string $fromDate = null, ?string $toDate = null, ?string $hideClosed = null): mixed
    {
        return Dinero::client()
            ->withQueryParameters([
                'from' => $fromDate,
                'to' => $toDate,
                'hideClosed' => $hideClosed,
            ])
            ->get('/state-of-account/'.$guid.'/pdf')
            ->json();
    }

    /**
     * Send the contacts state of account as an email.
     *
     * @return void
     */
    public function email(string $guid, string $ccToSender, string $hideClose, ?string $receiver = null, ?string $subject = null, ?string $message = null, ?string $to = null)
    {
        Dinero::client()
            ->post('/state-of-account/'.$guid.'/email', [
                'ccToSender' => $ccToSender,
                'hideClose' => $hideClose,
                'receiver' => $receiver,
                'subject' => $subject,
                'message' => $message,
                'to' => $to,
            ])
            ->json();
    }
}
