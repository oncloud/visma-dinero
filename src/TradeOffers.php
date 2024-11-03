<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class TradeOffers
{
    /**
     * Create trade offer. Saves a trade offer.
     *
     * @param  array  $productLines
     * @param  string  $contactGuid
     * @param  string|null  $currency
     * @param  string|null  $language
     * @param  string|null  $externalReference
     * @param  string|null  $description
     * @param  string|null  $comment
     * @param  string|null  $date
     * @param  string|null  $address
     * @param  string|null  $guid
     * @param  string|null  $showLinesInclVat
     * @param  string|null  $invoiceTemplateId
     * @return mixed
     */
    public function create($productLines, $contactGuid, $currency = null, $language = null, $externalReference = null, $description = null, $comment = null, $date = null, $address = null, $guid = null, $showLinesInclVat = null, $invoiceTemplateId = null)
    {
        return Dinero::client()
            ->post('/tradeoffers', [
                'productLines' => $productLines,
                'contactGuid' => $contactGuid,
                'currency' => $currency,
                'language' => $language,
                'externalReference' => $externalReference,
                'description' => $description,
                'comment' => $comment,
                'date' => $date,
                'address' => $address,
                'guid' => $guid,
                'showLinesInclVat' => $showLinesInclVat,
                'invoiceTemplateId' => $invoiceTemplateId,
            ])
            ->json();
    }

    /**
     * List trade offers. Retrieve a list of trade offers for the organization.
     *
     * @param  string|null  $fields  (query parameter)
     * @param  string|null  $queryFilter  (query parameter)
     * @param  string|null  $changesSince  (query parameter)
     * @param  string|null  $deletedOnly  (query parameter)
     * @param  string|null  $freeTextSearch  (query parameter)
     * @param  int|null  $page  (query parameter)
     * @param  int|null  $pageSize  (query parameter)
     * @param  string|null  $sort  (query parameter)
     * @param  string|null  $sortOrder  (query parameter)
     * @return mixed
     */
    public function list($fields = null, $queryFilter = null, $changesSince = null, $deletedOnly = null, $freeTextSearch = null, $page = null, $pageSize = null, $sort = null, $sortOrder = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'fields' => $fields,
                'queryFilter' => $queryFilter,
                'changesSince' => $changesSince,
                'deletedOnly' => $deletedOnly,
                'freeTextSearch' => $freeTextSearch,
                'page' => $page,
                'pageSize' => $pageSize,
                'sort' => $sort,
                'sortOrder' => $sortOrder,
            ])
            ->get('/tradeoffers')
            ->json();
    }

    /**
     * Get trade offer totals. Fetch a trade offer to get total and lines sums.
     *
     * @param  array  $productLines
     * @param  string|null  $contactGuid
     * @param  string|null  $currency
     * @param  string|null  $language
     * @param  string|null  $externalReference
     * @param  string|null  $description
     * @param  string|null  $comment
     * @param  string|null  $date
     * @param  string|null  $address
     * @param  string|null  $guid
     * @param  string|null  $showLinesInclVat
     * @param  string|null  $invoiceTemplateId
     * @return mixed
     */
    public function getTotals($productLines, $contactGuid = null, $currency = null, $language = null, $externalReference = null, $description = null, $comment = null, $date = null, $address = null, $guid = null, $showLinesInclVat = null, $invoiceTemplateId = null)
    {
        return Dinero::client()
            ->post('/tradeoffers/totals', [
                'productLines' => $productLines,
                'contactGuid' => $contactGuid,
                'currency' => $currency,
                'language' => $language,
                'externalReference' => $externalReference,
                'description' => $description,
                'comment' => $comment,
                'date' => $date,
                'address' => $address,
                'guid' => $guid,
                'showLinesInclVat' => $showLinesInclVat,
                'invoiceTemplateId' => $invoiceTemplateId,
            ])
            ->json();
    }

    /**
     * Get trade offer as json or pdf. Get tradeoffer as json or pdf. Define the Accept header of your request to either
     * 'application/json' or 'application/octet-stream'.
     *
     * @param  string  $guid
     * @return mixed
     */
    public function get($guid)
    {
        return Dinero::client()
            ->get('/tradeoffers/'.$guid)
            ->json();
    }

    /**
     * Delete trade offer. Delete a trade offer.
     *
     * @param  string  $guid
     * @param  string|null  $timestamp
     * @return mixed
     */
    public function delete($guid, $timestamp = null)
    {
        return Dinero::client()
            ->delete('/tradeoffers/'.$guid, [
                'timestamp' => $timestamp,
            ])
            ->json();
    }

    /**
     * Get trade offer email template. Get the email template for the email with to a public version of the trade offer
     * where it can be printed or downloaded as pdf.
     *
     * @param  string  $guid
     * @return mixed
     */
    public function getEmailTemplate($guid)
    {
        return Dinero::client()
            ->get('/tradeoffers/'.$guid.'/email/template')
            ->json();
    }

    /**
     * Send trade offer email. Send an email with link to a public version of the trade offer where it can be printed or
     * downloaded as a pdf
     *
     * @param  string  $guid
     * @param  string|null  $timestamp
     * @param  string|null  $sender
     * @param  string|null  $ccToSender
     * @param  string|null  $receiver
     * @param  string|null  $subject
     * @param  string|null  $message
     * @param  string|null  $addVoucherAsPdfAttachment
     *
     * @returns mixed
     */
    public function send($guid, $timestamp = null, $sender = null, $ccToSender = null, $receiver = null, $subject = null, $message = null, $addVoucherAsPdfAttachment = null)
    {
        return Dinero::client()
            ->post('/tradeoffers/'.$guid.'/email', [
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
     * Create invoice from trade offer. Generate a invoice of a given trade offer. (OBS Generating a invoice of the
     * trade offer, will trigger a new timestamp on the trade offer).
     *
     * @param  string  $guid
     * @param  string|null  $timestamp
     * @return mixed
     */
    public function createInvoice($guid, $timestamp = null)
    {
        return Dinero::client()
            ->post('/tradeoffers/'.$guid.'/generate-invoice', [
                'timestamp' => $timestamp,
            ])
            ->json();
    }

    /**
     * Update trade offer. Update an existing trade offer.
     *
     * @param  string  $guid
     * @param  string  $contactGuid
     * @param  string  $timestamp
     * @param  array  $productLines
     * @param  string|null  $currency
     * @param  string|null  $language
     * @param  string|null  $externalReference
     * @param  string|null  $description
     * @param  string|null  $comment
     * @param  string|null  $date
     * @param  string|null  $address
     * @param  string|null  $guidBody
     * @param  string|null  $showLinesInclVat
     * @param  string|null  $invoiceTemplateId
     * @return mixed
     */
    public function update($guid, $contactGuid, $timestamp, $productLines, $currency = null, $language = null, $externalReference = null, $description = null, $comment = null, $date = null, $address = null, $guidBody = null, $showLinesInclVat = null, $invoiceTemplateId = null)
    {
        return Dinero::client('v1.2')
            ->put('/tradeoffers/'.$guid, [
                'contactGuid' => $contactGuid,
                'timestamp' => $timestamp,
                'productLines' => $productLines,
                'currency' => $currency,
                'language' => $language,
                'externalReference' => $externalReference,
                'description' => $description,
                'comment' => $comment,
                'date' => $date,
                'address' => $address,
                'guid' => $guidBody,
                'showLinesInclVat' => $showLinesInclVat,
                'invoiceTemplateId' => $invoiceTemplateId,
            ])
            ->json();
    }

    /**
     * List mailoouts.
     *
     * @param  string  $guid
     * @param  string|null  $changesSince  (query)
     * @param  string|null  $includeSms  (query)
     * @return mixed
     */
    public function listMailouts($guid, $changesSince = null, $includeSms = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'changesSince' => $changesSince,
                'includeSms' => $includeSms,
            ])
            ->get('/tradeoffers/'.$guid.'/mailouts')
            ->json();
    }
}
