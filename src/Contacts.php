<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class Contacts
{
    /**
     * ListRetrieves a list of contacts for the organization ordered by UpdatedAt.
     */
    public function list(?string $fields = null, ?string $queryFilter = null, ?string $changesSince = null, ?string $deletedOnly = null, ?int $page = null, ?int $pageSize = null): mixed
    {
        return Dinero::client()
            ->withQueryParameters([
                'fields' => $fields,
                'queryFilter' => $queryFilter,
                'changesSince' => $changesSince,
                'deletedOnly' => $deletedOnly,
                'page' => $page,
                'pageSize' => $pageSize,
            ])
            ->get('/contacts')
            ->json();
    }

    /**
     * Get contact. Retrieves contact information for the contact with the given id.
     *
     * @return mixed
     */
    public function get(string $guid)
    {
        return Dinero::client()
            ->get('/contacts/'.$guid)
            ->json();
    }

    /**
     * Add a new contact to the organization.
     */
    public function create(string $name, string $countryKey, bool $isPerson, bool $isMember, bool $useCvr,
        ?string $street = null, ?string $zipCode = null, ?string $city = null, ?string $phone = null,
        ?string $email = null, ?string $webpage = null, ?string $attPerson = null,
        ?string $externalReference = null, ?string $paymentConditionType = null,
        ?int $paymentConditionNumberOfDays = null, ?string $vatNumber = null, ?string $eanNumber = null,
        ?string $memberNumber = null, ?string $companyTypeKey = null, ?string $invoiceMailOutOptionKey = null, ?string $contactGuid = null): mixed
    {
        return Dinero::client()
            ->post('/contacts', [
                'name' => $name,
                'countryKey' => $countryKey,
                'isPerson' => $isPerson,
                'isMember' => $isMember,
                'useCvr' => $useCvr,
                'street' => $street,
                'zipCode' => $zipCode,
                'city' => $city,
                'phone' => $phone,
                'email' => $email,
                'webpage' => $webpage,
                'attPerson' => $attPerson,
                'externalReference' => $externalReference,
                'paymentConditionType' => $paymentConditionType,
                'paymentConditionNumberOfDays' => $paymentConditionNumberOfDays,
                'vatNumber' => $vatNumber,
                'eanNumber' => $eanNumber,
                'memberNumber' => $memberNumber,
                'companyTypeKey' => $companyTypeKey,
                'invoiceMailOutOptionKey' => $invoiceMailOutOptionKey,
                'contactGuid' => $contactGuid,
            ])
            ->json();
    }

    /**
     * Updates an existing contact.
     */
    public function update(string $guid, string $name, string $countryKey, bool $isPerson, bool $isMember, bool $useCvr,
        ?string $street = null, ?string $zipCode = null, ?string $city = null, ?string $phone = null,
        ?string $email = null, ?string $webpage = null, ?string $attPerson = null,
        ?string $externalReference = null, ?string $paymentConditionType = null,
        ?int $paymentConditionNumberOfDays = null, ?string $vatNumber = null, ?string $eanNumber = null,
        ?string $memberNumber = null, ?string $companyTypeKey = null): mixed
    {
        return Dinero::client()
            ->put('/contacts/'.$guid, [
                'name' => $name,
                'countryKey' => $countryKey,
                'isPerson' => $isPerson,
                'isMember' => $isMember,
                'useCvr' => $useCvr,
                'street' => $street,
                'zipCode' => $zipCode,
                'city' => $city,
                'phone' => $phone,
                'email' => $email,
                'webpage' => $webpage,
                'attPerson' => $attPerson,
                'externalReference' => $externalReference,
                'paymentConditionType' => $paymentConditionType,
                'paymentConditionNumberOfDays' => $paymentConditionNumberOfDays,
                'vatNumber' => $vatNumber,
                'eanNumber' => $eanNumber,
                'memberNumber' => $memberNumber,
                'companyTypeKey' => $companyTypeKey,
            ])
            ->json();
    }

    /**
     * Deletes the contact with the given id.
     *
     * @return mixed
     */
    public function delete(string $guid)
    {
        return Dinero::client()
            ->delete('/contacts/'.$guid)
            ->json();
    }

    /**
     * Restores the contact with the given id.
     *
     * @return mixed
     */
    public function restore(string $guid)
    {
        return Dinero::client()
            ->post('/contacts/'.$guid.'/restore')
            ->json();
    }

    /**
     * Retrieves the notes for the contact with the given id.
     *
     * @return mixed
     */
    public function listContactNotes(string $guid, ?string $fields = null, ?string $deletedOnly = null, ?int $page = null, ?int $pageSize = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'fields' => $fields,
                'deletedOnly' => $deletedOnly,
                'page' => $page,
                'pageSize' => $pageSize,
            ])
            ->get('/contacts/'.$guid.'/notes')
            ->json();
    }

    /**
     * Retrieves the notes for the contact with the given id.
     *
     * @return mixed
     */
    public function getContactNote(string $guid, string $noteGuid)
    {
        return Dinero::client()
            ->get('/contacts/'.$guid.'/notes/'.$noteGuid)
            ->json();
    }

    /**
     * Creates a note for the contact with the given id.
     *
     * @return mixed
     */
    public function createContactNote(string $guid, string $text)
    {
        return Dinero::client()
            ->post('/contacts/'.$guid.'/notes', [
                'text' => $text,
            ])
            ->json();
    }

    /**
     * Updates a note for the contact with the given id.
     *
     * @return mixed
     */
    public function updateContactNote(string $guid, string $noteGuid, string $text)
    {
        return Dinero::client()
            ->put('/contacts/'.$guid.'/notes/'.$noteGuid, [
                'text' => $text,
            ])
            ->json();
    }

    /**
     * Deletes a note for the contact with the given id.
     *
     * @return mixed
     */
    public function deleteContactNote(string $guid, string $noteGuid)
    {
        return Dinero::client()
            ->delete('/contacts/'.$guid.'/notes/'.$noteGuid)
            ->json();
    }
}
