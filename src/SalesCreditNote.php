<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class SalesCreditNote
{
    /**
     * Create credit note. Save a credit note.
     *
     * @param array $lines
     * @param string|null $guid
     * @param string|null $creditNoteFor
     * @param string|null $currency
     * @param string|null $language
     * @param string|null $externalReference
     * @param string|null $description
     * @param string|null $comment
     * @param string|null $date
     * @param string|null $address
     * @param string|null $showLinesInclVat
     * @param string|null $invoiceTemplateId
     * @param string|null $contactGuid
     * @return mixed
     */
    public function create(array $lines, string $guid = null, string $creditNoteFor = null, string $currency = null,
                           string $language = null, string $externalReference = null, string $description = null,
                           string $comment = null, string $date = null, string $address = null, string $showLinesInclVat = null,
                           string $invoiceTemplateId = null, string $contactGuid = null)
    {
        return Dinero::client()
            ->post('/vouchers/sales/creditnotes', [
                'lines' => $lines,
                'guid' => $guid,
                'creditNoteFor' => $creditNoteFor,
                'currency' => $currency,
                'language' => $language,
                'externalReference' => $externalReference,
                'description' => $description,
                'comment' => $comment,
                'date' => $date,
                'address' => $address,
                'showLinesInclVat' => $showLinesInclVat,
                'invoiceTemplateId' => $invoiceTemplateId,
                'contactGuid' => $contactGuid,
            ])
            ->json();
    }

    /**
     * List credit notes. Retrieve a list of credit notes for the organization.
     *
     * @param string|null $startDate
     * @param string|null $endDate
     * @param string|null $fields
     * @param string|null $freeTextSearch
     * @param string|null $statusFilter
     * @param string|null $queryFilter
     * @param string|null $changesSince
     * @param string|null $deletedOnly
     * @param int|null $page
     * @param int|null $pageSize
     * @param string|null $sort
     * @param string|null $sortOrder
     * @return mixed
     */
    public function list(string $startDate = null, string $endDate = null, string $fields = null, string $freeTextSearch = null,
        string $statusFilter = null, string $queryFilter = null, string $changesSince = null, string $deletedOnly = null,
        int $page = null, int $pageSize = null, string $sort = null, string $sortOrder = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'startDate' => $startDate,
                'endDate' => $endDate,
                'fields' => $fields,
                'freeTextSearch' => $freeTextSearch,
                'statusFilter' => $statusFilter,
                'queryFilter' => $queryFilter,
                'changesSince' => $changesSince,
                'deletedOnly' => $deletedOnly,
                'page' => $page,
                'pageSize' => $pageSize,
                'sort' => $sort,
                'sortOrder' => $sortOrder,
            ])
            ->get('/vouchers/sales/creditnotes')
            ->json();
    }

    /**
     * Update credit note. Update an existing credit note. The credit note cannot be updated if booked.
     *
     * @param string $guid
     * @param array $lines
     * @param string $timestamp
     * @param string|null $creditNoteFor
     * @param string|null $currency
     * @param string|null $language
     * @param string|null $externalReference
     * @param string|null $description
     * @param string|null $comment
     * @param string|null $date
     * @param string|null $address
     * @param string|null $showLinesInclVat
     * @param string|null $invoiceTemplateId
     * @param string|null $contactGuid
     * @return mixed
     */
    public function update(string $guid, array $lines, string $timestamp, string $creditNoteFor = null, string $currency = null,
                           string $language = null, string $externalReference = null, string $description = null,
                           string $comment = null, string $date = null, string $address = null, string $showLinesInclVat = null,
                           string $invoiceTemplateId = null, string $contactGuid = null)
    {
        return Dinero::client('v1.2')
            ->put('/vouchers/sales/creditnotes/' . $guid, [
                'lines' => $lines,
                'timestamp' => $timestamp,
                'creditNoteFor' => $creditNoteFor,
                'currency' => $currency,
                'language' => $language,
                'externalReference' => $externalReference,
                'description' => $description,
                'comment' => $comment,
                'date' => $date,
                'address' => $address,
                'showLinesInclVat' => $showLinesInclVat,
                'invoiceTemplateId' => $invoiceTemplateId,
                'contactGuid' => $contactGuid,
            ])
            ->json();
    }

    /**
     * Delete credit note. Delete credit note. The creditnote cannot be deleted if booked.
     *
     * @param string $guid
     * @param string|null $timestamp
     * @return mixed
     */
    public function delete(string $guid, string $timestamp = null)
    {
        return Dinero::client()
            ->delete('/vouchers/sales/creditnotes/' . $guid, [
                'timestamp' => $timestamp,
            ])
            ->json();
    }

    /**
     * Get credit note. Gets a credit note.
     *
     * @param string $guid
     * @return mixed
     */
    public function get(string $guid)
    {
        return Dinero::client()
            ->get('/vouchers/sales/creditnotes/' . $guid)
            ->json();
    }

    /**
     * Book credit note. Book a credit note.
     *
     * @param string $guid
     * @param string $timestamp
     * @param string|null $number
     * @return mixed
     */
    public function book(string $guid, string $timestamp, string $number = null)
    {
        return Dinero::client()
            ->post('/vouchers/sales/creditnotes/' . $guid . '/book', [
                'timestamp' => $timestamp,
                'number' => $number,
            ])
            ->json();
    }

    /**
     * Get credit note totals. Fetch a credit note to get total and line sums calculations.
     *
     * @param array $lines
     * @param string|null $creditNoteFor
     * @param string|null $currency
     * @param string|null $language
     * @param string|null $externalReference
     * @param string|null $description
     * @param string|null $comment
     * @param string|null $date
     * @param string|null $address
     * @param string|null $showLinesInclVat
     * @param string|null $invoiceTemplateId
     * @param string|null $contactGuid
     * @return mixed
     */
    public function getTotals(array $lines, string $creditNoteFor = null, string $currency = null, string $language = null,
        string $externalReference = null, string $description = null, string $comment = null, string $date = null,
        string $address = null, string $showLinesInclVat = null, string $invoiceTemplateId = null, string $contactGuid = null)
    {
        return Dinero::client()
            ->post('/vouchers/sales/creditnotes/fetch', [
                'lines' => $lines,
                'creditNoteFor' => $creditNoteFor,
                'currency' => $currency,
                'language' => $language,
                'externalReference' => $externalReference,
                'description' => $description,
                'comment' => $comment,
                'date' => $date,
                'address' => $address,
                'showLinesInclVat' => $showLinesInclVat,
                'invoiceTemplateId' => $invoiceTemplateId,
                'contactGuid' => $contactGuid,
            ])
            ->json();
    }

    /**
     * Get credit note email template. Get the email template for the email with link to a public version of the credit
     * note where it can be printed or downloaded as pdf.
     *
     * @param string $guid
     * @param string $addVoucherAsPdfAttachment
     * @param string|null $sender
     * @param string|null $receiver
     * @param string|null $subject
     * @param string|null $message
     * @return mixed
     */
    public function getEmailTemplate(string $guid, string $addVoucherAsPdfAttachment, string $sender = null, string $receiver = null,
        string $subject = null, string $message = null)
    {
        return Dinero::client()
            ->get('/vouchers/sales/creditnotes/' . $guid . '/email/template', [
                'addVoucherAsPdfAttachment' => $addVoucherAsPdfAttachment,
                'sender' => $sender,
                'receiver' => $receiver,
                'subject' => $subject,
                'message' => $message,
            ])
            ->json();
    }

    /**
     * Send credit note. Send an email with link to a public version of the credit note where it can be printed or
     * downloaded as a pdf
     *
     * @param string $guid
     * @param string|null $addVoucherAsPdfAttachment
     * @param string|null $sender
     * @param string|null $receiver
     * @param string|null $subject
     * @param string|null $message
     * @return mixed
     */
    public function send(string $guid, string $addVoucherAsPdfAttachment = null, string $sender = null, string $receiver = null,
        string $subject = null, string $message = null)
    {
        return Dinero::client()
            ->post('/vouchers/sales/creditnotes/' . $guid . '/email/send', [
                'addVoucherAsPdfAttachment' => $addVoucherAsPdfAttachment,
                'sender' => $sender,
                'receiver' => $receiver,
                'subject' => $subject,
                'message' => $message,
            ])
            ->json();
    }

    /**
     * Get credit note pdf. Get a pdf of the credit note.
     *
     * @param string $guid
     * @return mixed
     */
    public function getPdf(string $guid)
    {
        return Dinero::client()
            ->get('/vouchers/sales/creditnotes/' . $guid . '/pdf')
            ->json();
    }

    /**
     * Send credit note with EAN. Send an e-credit note to an EAN customer
     *
     * @param string $guid
     * @param string|null $orderReference
     * @param string|null $attPerson
     * @param string|null $timestamp
     * @return mixed
     */
    public function sendWithEan(string $guid, string $orderReference = null, string $attPerson = null, string $timestamp = null)
    {
        return Dinero::client()
            ->post('/vouchers/sales/creditnotes/' . $guid . '/e-creditnote', [
                'orderReference' => $orderReference,
                'attPerson' => $attPerson,
                'timestamp' => $timestamp,
            ])
            ->json();
    }

    /**
     * List mailouts
     *
     * @param string $guid
     * @param string|null $changesSince
     * @return mixed
     */
    public function listMailouts(string $guid, string $changesSince = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'changesSince' => $changesSince,
            ])
            ->get('/vouchers/sales/creditnotes/' . $guid . '/mailouts')
            ->json();
    }
}
