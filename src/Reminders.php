<?php

namespace OnCloud\Dinero;

class Reminders
{
    /**
     * Get reminders.
     *
     * @param string $voucherGuid
     * @param string|null $changesSince
     * @return mixed
     */
    public function list(string $voucherGuid, string $changesSince = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'changesSince' => $changesSince,
            ])
            ->get('/invoices/' . $voucherGuid . '/reminders')
            ->json();
    }

    /**
     * Create reminder. Add a reminder to invoice
     *
     * @param string $voucherGuid
     * @param string $timestamp
     * @param string $date
     * @param string $withDebtCollectionWarning
     * @param string $withFee
     * @param string $withInterestFee
     * @param string $withCompensationFee
     * @param string|null $title
     * @param string|null $description
     * @return mixed
     */
    public function create(string $voucherGuid, string $timestamp, string $date, string $withDebtCollectionWarning,
                           string $withFee, string $withInterestFee, string $withCompensationFee, string $title = null,
                           string $description = null)
    {
        return Dinero::client()
            ->post('/invoices/' . $voucherGuid . '/reminders', [
                'timestamp' => $timestamp,
                'date' => $date,
                'withDebtCollectionWarning' => $withDebtCollectionWarning,
                'withFee' => $withFee,
                'withInterestFee' => $withInterestFee,
                'withCompensationFee' => $withCompensationFee,
                'title' => $title,
                'description' => $description,
            ])
            ->json();
    }

    /**
     * Get reminder. Get reminder.
     *
     * @param string $voucherGuid
     * @param int $id
     * @return mixed
     */
    public function get(string $voucherGuid, int $id)
    {
        return Dinero::client()
            ->accept('application/json')
            ->get('/invoices/' . $voucherGuid . '/reminders/' . $id)
            ->json();
    }

    /**
     * Update reminder. Add a reminder to invoice
     *
     * @param int $id
     * @param string $voucherGuid
     * @param string $timestamp
     * @param string $date
     * @param string $withDebtCollectionWarning
     * @param string $withFee
     * @param string $withInterestFee
     * @param string $withCompensationFee
     * @param string|null $title
     * @param string|null $description
     * @return mixed
     */
    public function update(int $id, string $voucherGuid, string $timestamp, string $date, string $withDebtCollectionWarning,
                           string $withFee, string $withInterestFee, string $withCompensationFee, string $title = null,
                           string $description = null)
    {
        return Dinero::client()
            ->put('/invoices/' . $voucherGuid . '/reminders/' . $id, [
                'timestamp' => $timestamp,
                'date' => $date,
                'withDebtCollectionWarning' => $withDebtCollectionWarning,
                'withFee' => $withFee,
                'withInterestFee' => $withInterestFee,
                'withCompensationFee' => $withCompensationFee,
                'title' => $title,
                'description' => $description,
            ])
            ->json();
    }

    /**
     * Delete reminder.
     *
     * @param string $voucherGuid
     * @param int $id
     * @param string $timestamp
     * @return mixed
     */
    public function delete(string $voucherGuid, int $id, string $timestamp)
    {
        return Dinero::client()
            ->delete('/invoices/' . $voucherGuid . '/reminders/' . $id, [
                'timestamp' => $timestamp,
            ])
            ->json();
    }

    /**
     * Get next reminder
     *
     * @param string $voucherGuid
     * @return mixed
     */
    public function getNext(string $voucherGuid)
    {
        return Dinero::client()
            ->get('/invoices/' . $voucherGuid . '/reminders/next')
            ->json();
    }

    /**
     * Fetch reminder
     *
     * @param string $voucherGuid
     * @param string $date
     * @param string $withDebtCollectionWarning
     * @param string $withFee
     * @param string $withInterestFee
     * @param string $withCompensationFee
     * @return mixed
     */
    public function fetch(string $voucherGuid, string $date, string $withDebtCollectionWarning,string $withFee,
                          string $withInterestFee, string $withCompensationFee)
    {
        return Dinero::client()
            ->post('/invoices/' . $voucherGuid . '/reminders/fetch', [
                'date' => $date,
                'withDebtCollectionWarning' => $withDebtCollectionWarning,
                'withFee' => $withFee,
                'withInterestFee' => $withInterestFee,
                'withCompensationFee' => $withCompensationFee,
            ])
            ->json();
    }

    /**
     * Book reminder
     *
     * @param string $voucherGuid
     * @param int $id
     * @param string $timestamp
     * @return mixed
     */
    public function book(string $voucherGuid, int $id, string $timestamp)
    {
        return Dinero::client()
            ->post('/invoices/' . $voucherGuid . '/reminders/' . $id . '/book', [
                'timestamp' => $timestamp,
            ])
            ->json();
    }

    /**
     * Get reminder email template
     *
     * @param string $voucherGuid
     */
    public function getEmailTemplate(string $voucherGuid)
    {
        return Dinero::client()
            ->get('/invoices/' . $voucherGuid . '/reminders/email/template')
            ->json();
    }

    /**
     * Send reminder email. Send an reminder email
     *
     * @param string $voucherGuid
     * @param string|null $timestamp
     * @param string|null $sender
     * @param string|null $ccToSender
     * @param string|null $receiver
     * @param string|null $subject
     * @param string|null $message
     * @param string|null $addVoucherAsPdfAttachment
     * @return mixed
     */
    public function sendEmail(string $voucherGuid, string $timestamp = null, string $sender = null, string $ccToSender = null,
                              string $receiver = null, string $subject = null, string $message = null, string $addVoucherAsPdfAttachment = null)
    {
        return Dinero::client()
            ->post('/invoices/' . $voucherGuid . '/reminders/email', [
                'timestamp' => $timestamp,
                'sender' => $sender,
                'ccToSender' => $ccToSender,
                'receiver' => $receiver,
                'subject' => $subject,
                'message' => $message,
                'addVoucherAsPdfAttachment' => $addVoucherAsPdfAttachment,
            ])
            ->json();
    }

    /**
     * Send reminder with EAN. Send an e-reminder to an EAN customer.
     *
     * @param string $voucherGuid
     * @param int $id
     * @param string|null $timestamp
     * @param string|null $attPerson
     * @param string|null $receiverEanNumber
     * @return mixed
     */
    public function sendEan(string $voucherGuid, int $id, string $timestamp = null, string $attPerson = null, string $receiverEanNumber = null)
    {
        return Dinero::client()
            ->post('/invoices/' . $voucherGuid . '/reminders/' . $id . '/e-reminder', [
                'timestamp' => $timestamp,
                'attPerson' => $attPerson,
                'receiverEanNumber' => $receiverEanNumber,
            ])
            ->json();
    }
}
