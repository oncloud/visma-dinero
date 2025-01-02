<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class Invoices
{
    /**
     * List invoices. Retrieve a list of invoices for the organization.
     */
    public function list(?string $startDate = null, ?string $endDate = null, ?string $fields = null,
        ?string $freeTextSearch = null, ?string $statusFilter = null, ?string $queryFilter = null,
        ?string $changesSince = null, ?string $deletedOnly = null, ?int $page = null, ?int $pageSize = null,
        ?string $sort = null, ?string $sortOrder = null)
    {
        return Dinero::client()
            // ->dd()
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
            ->get('/invoices')
            ->json();
    }

    /**
     * Create invoice. Saves invoice.
     *
     * @return mixed
     */
    public function create(array $productLine, ?string $contactGuid = null, ?string $paymentConditionType = null,
        ?int $paymentConditionNumberOfDays = null, ?string $currency = null, ?string $language = null, ?string $externalReference = null,
        ?string $description = null, ?string $comment = null, ?string $date = null, ?string $address = null, ?string $guid = null,
        ?bool $showLinesInclVat = null, ?string $invoiceTemplateId = null, ?int $reminderFee = null,
        ?int $reminderInterestRate = null, ?bool $isMobilePayInvoiceEnabled = null, ?bool $isPensoPayEnabled = null)
    {
        return Dinero::client()
            ->post('/invoices', [
                'productLines' => $productLine,
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
                'contactGuid' => $contactGuid,
                'paymentConditionNumberOfDays' => $paymentConditionNumberOfDays,
                'paymentConditionType' => $paymentConditionType,
                'reminderFee' => $reminderFee,
                'reminderInterestRate' => $reminderInterestRate,
                'isMobilePayInvoiceEnabled' => $isMobilePayInvoiceEnabled,
                'isPensoPayEnabled' => $isPensoPayEnabled,
            ])
            ->json();
    }

    /**
     * Get invoice total. Fetch a invoice to get total, line sums and payment date calculations.
     *
     * @return mixed
     */
    public function fetch(array $productLine, ?string $currency = null, ?string $language = null,
        ?string $externalReference = null, ?string $description = null, ?string $comment = null,
        ?string $date = null, ?string $address = null, ?string $guid = null, ?bool $showLinesInclVat = null,
        ?string $invoiceTemplateId = null, ?string $contactGuid = null, ?int $paymentConditionNumberOfDays = null,
        ?string $paymentConditionType = null, ?int $reminderFee = null, ?int $reminderInterestRate = null,
        ?bool $isMobilePayInvoiceEnabled = null, ?bool $isPensoPayEnabled = null)
    {
        return Dinero::client()
            ->post('/invoices/fetch', [
                'productLines' => $productLine,
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
                'contactGuid' => $contactGuid,
                'paymentConditionNumberOfDays' => $paymentConditionNumberOfDays,
                'paymentConditionType' => $paymentConditionType,
                'reminderFee' => $reminderFee,
                'reminderInterestRate' => $reminderInterestRate,
                'isMobilePayInvoiceEnabled' => $isMobilePayInvoiceEnabled,
                'isPensoPayEnabled' => $isPensoPayEnabled,
            ])
            ->json();
    }

    /**
     * Get invoice as JSON. Get invoice as JSON.
     *
     * @return mixed
     */
    public function getJSON(string $invoiceGuid)
    {
        return Dinero::client()
            ->withHeader('Accept', 'application/json')
            ->get('/invoices/'.$invoiceGuid)
            ->json();
    }

    /**
     * Get invoice as PDF. Get invoice as PDF. PDF's can only be generated from booked invoices.
     *
     * @return mixed
     */
    public function getPDF(string $invoiceGuid)
    {
        return Dinero::client()
            ->withHeader('Accept', 'application/octet-stream')
            ->get('/invoices/'.$invoiceGuid)
            ->json();
    }

    /**
     * Delete Invoice. The invoice cannot be deleted if booked.
     *
     * @return mixed
     */
    public function delete(string $invoiceGuid)
    {
        return Dinero::client()
            ->delete('/invoices/'.$invoiceGuid)
            ->json();
    }

    /**
     * Book invoice. Book invoice.
     *
     * @return mixed
     */
    public function book(string $invoiceGuid, string $timestamp, ?int $number = null)
    {
        return Dinero::client()
            ->post('/invoices/'.$invoiceGuid.'/book', [
                'timestamp' => $timestamp,
                'number' => $number,
            ])
            ->json();
    }

    /**
     * Send invoice email. Send an email with a link to a public version of the invoice where it can be printed or
     * downloaded as PDF.
     *
     * @return mixed
     */
    public function sendEmail(string $invoiceGuid, ?string $timestamp = null, ?string $sender = null, ?string $receiver = null,
        ?string $subject = null, ?string $message = null, ?bool $addVoucherAsPdfAttachment = null)
    {
        return Dinero::client()
            ->post('/invoices/'.$invoiceGuid.'/email', [
                'timestamp' => $timestamp,
                'sender' => $sender,
                'receiver' => $receiver,
                'subject' => $subject,
                'message' => $message,
                'addVoucherAsPdfAttachment' => $addVoucherAsPdfAttachment,
            ])
            ->json();
    }

    /**
     * Get Invoice email template. Get the email template for the email with link to a public version of the invoice
     * where it can be printed or downloaded as PDF.
     *
     * @return mixed
     */
    public function getEmailTemplate(string $guid)
    {
        return Dinero::client('v2')
            ->get('/invoices/'.$guid.'/email/template')
            ->json();
    }

    /**
     * Get pre-reminder template. Get the pre-reminder template for the email with link to a public version of the
     * invoice where it can be printed or downloaded as pdf.
     *
     * @return array|mixed
     */
    public function getPreReminderTemplate(string $guid)
    {
        return Dinero::client()
            ->get('/invoices/'.$guid.'/pre-reminder/template')
            ->json();
    }

    /**
     * Send invoice pre-reminder. Send a pre reminder email with link to a public version of the invoice where it can be
     * printed or downloaded as a pdf. The invoice needs to be overdue to send the reminder. A pre-reminder is a mail
     * reminding the customer, that the invoice is overdue. This will not cause a reminder to be created in Dinero,
     * this is only a mailout.
     */
    public function sendPreReminder(string $guid, ?string $timestamp = null, ?string $sender = null,
        ?bool $ccToSender = null, ?string $receiver = null, ?string $subject = null,
        ?string $message = null, ?bool $addVoucherAsPdfAttachment = null)
    {
        return Dinero::client()
            ->post('/invoices/'.$guid.'/pre-reminder', [
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
     * Send invoice with EAN. Send an e-invoice to an EAN customer.
     *
     * Uses API v2.
     *
     * @return array|mixed
     */
    public function sendWithEan(string $guid, ?string $orderReference = null, ?string $attPerson = null,
        ?string $timestamp = null, ?string $receiverEanNumber = null)
    {
        return Dinero::client('v2')
            ->post('/invoices/'.$guid.'/with-ean', [
                'orderReference' => $orderReference,
                'attPerson' => $attPerson,
                'timestamp' => $timestamp,
                'receiverEanNumber' => $receiverEanNumber,
            ])
            ->json();
    }

    /**
     * Update invoice. Update an existing invoice. The invoice cannot be updated if booked.
     *
     * Uses API v1.2
     *
     * @return array|mixed
     */
    public function update(string $guid, array $productLine, string $timestamp, ?string $currency = null, ?string $language = null,
        ?string $externalReference = null, ?string $description = null, ?string $comment = null,
        ?string $date = null, ?string $address = null, ?bool $showLinesInclVat = null,
        ?string $invoiceTemplateId = null, ?string $contactGuid = null, ?int $paymentConditionNumberOfDays = null,
        ?string $paymentConditionType = null, ?int $reminderFee = null, ?int $reminderInterestRate = null,
        ?bool $isMobilePayInvoiceEnabled = null, ?bool $isPensoPayEnabled = null)
    {
        return Dinero::client('v1.2')
            ->put('/invoices/'.$guid, [
                'productLines' => $productLine,
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
                'paymentConditionNumberOfDays' => $paymentConditionNumberOfDays,
                'paymentConditionType' => $paymentConditionType,
                'reminderFee' => $reminderFee,
                'reminderInterestRate' => $reminderInterestRate,
                'isMobilePayInvoiceEnabled' => $isMobilePayInvoiceEnabled,
                'isPensoPayEnabled' => $isPensoPayEnabled,
                'timestamp' => $timestamp,
            ])
            ->json();
    }

    /**
     * Add Payment to invoice. Create a payment for an invoice. Payments can only be added to a booked invoice.
     *
     * @return array|mixed
     */
    public function addPayment(string $guid, string $description, int $amount, string $timestamp, int $depositAccountNumber, bool $remainderIsFee, ?string $externalReference = null, ?string $paymentDate = null, ?int $amountInForeignCurrency = null)
    {
        return Dinero::client()
            ->post('/invoices/'.$guid.'/payments', [
                'description' => $description,
                'amount' => $amount,
                'timestamp' => $timestamp,
                'depositAccountNumber' => $depositAccountNumber,
                'remainderIsFee' => $remainderIsFee,
                'externalReference' => $externalReference,
                'paymentDate' => $paymentDate,
                'amountInForeignCurrency' => $amountInForeignCurrency,
            ])
            ->json();
    }

    /**
     * Delete payment from invoice. Delete a payment from an invoice. Only booked invoices can have payments.
     *
     * @return array|mixed
     */
    public function deletePayment(string $guid, string $paymentGuid, ?string $timestamp = null)
    {
        return Dinero::client()
            ->delete('/invoices/'.$guid.'/payments/'.$paymentGuid, [
                'timestamp' => $timestamp,
            ])
            ->json();
    }

    /**
     * Get payments for invoice. Get the payments for an invoice.
     *
     * uses api v2
     *
     * @return array|mixed
     */
    public function getPayments(string $guid)
    {
        return Dinero::client('v2')
            ->get('/invoices/'.$guid.'/payments')
            ->json();
    }

    /**
     * Create credit note from invoice. Generate and saves a credit note draft of a given booked invoice.
     *
     * @return array|mixed
     */
    public function createCreditNote(string $guid, ?string $timestamp = null)
    {
        return Dinero::client()
            ->post('/invoices/'.$guid.'/generate-creditnote', [
                'timestamp' => $timestamp,
            ])
            ->json();
    }

    /**
     * List invoice templates. Get possible template for invoice.
     *
     * @return array|mixed
     */
    public function listTemplates()
    {
        return Dinero::client()
            ->get('/invoices/templates')
            ->json();
    }

    /**
     * List mailouts.
     */
    public function listMailouts(string $guid, ?string $changesSince = null, ?bool $includeSms = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'changesSince' => $changesSince,
                'includeSms' => $includeSms,
            ])
            ->get('/invoices/'.$guid.'/mailouts')
            ->json();
    }
}
