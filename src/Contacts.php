<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class Contacts
{

    /**
     * Retrieves a list of contacts for the organization ordered by UpdatedAt.
     *
     * @return mixed
     */
    public function list()
    {
        return Dinero::client()
            ->get('/contacts')
            ->json();
    }

    /**
     * Retrieves contact information for the contact with the given id.
     *
     * @param string $guid
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
     *
     * @param string $name
     * @param string $countryKey
     * @param bool $isPerson
     * @param bool $isMember
     * @param bool $useCvr
     * @param string|null $street
     * @param string|null $zipCode
     * @param string|null $city
     * @param string|null $phone
     * @param string|null $email
     * @param string|null $webpage
     * @param string|null $attPerson
     * @param string|null $externalReference
     * @param string|null $paymentConditionType
     * @param int|null $paymentConditionNumberOfDays
     * @param string|null $vatNumber
     * @param string|null $eanNumber
     * @param string|null $memberNumber
     * @param string|null $companyTypeKey
     * @param string|null $contactGuid
     * @return mixed
     */
    public function create(string $name, string $countryKey, bool $isPerson, bool $isMember, bool $useCvr,
                           string $street = null, string $zipCode = null, string $city = null, string $phone = null,
                           string $email = null, string $webpage = null, string $attPerson = null,
                           string $externalReference = null, string $paymentConditionType = null,
                           int $paymentConditionNumberOfDays = null, string $vatNumber = null, string $eanNumber = null,
                           string $memberNumber = null, string $companyTypeKey = null, string $contactGuid = null): mixed
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
                'contactGuid' => $contactGuid,
            ])
            ->json();
    }

    /**
     * Updates an existing contact.
     *
     * @param string $guid
     * @param string $name
     * @param string $countryKey
     * @param bool $isPerson
     * @param bool $isMember
     * @param bool $useCvr
     * @param string|null $street
     * @param string|null $zipCode
     * @param string|null $city
     * @param string|null $phone
     * @param string|null $email
     * @param string|null $webpage
     * @param string|null $attPerson
     * @param string|null $externalReference
     * @param string|null $paymentConditionType
     * @param int|null $paymentConditionNumberOfDays
     * @param string|null $vatNumber
     * @param string|null $eanNumber
     * @param string|null $memberNumber
     * @param string|null $companyTypeKey
     * @return mixed
     */
    public function update(string $guid, string $name, string $countryKey, bool $isPerson, bool $isMember, bool $useCvr,
                           string $street = null, string $zipCode = null, string $city = null, string $phone = null,
                           string $email = null, string $webpage = null, string $attPerson = null,
                           string $externalReference = null, string $paymentConditionType = null,
                           int $paymentConditionNumberOfDays = null, string $vatNumber = null, string $eanNumber = null,
                           string $memberNumber = null, string $companyTypeKey = null): mixed
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
     * @param string $guid
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
     * @param string $guid
     * @return mixed
     */
    public function restore(string $guid)
    {
        return Dinero::client()
            ->post('/contacts/'.$guid.'/restore')
            ->json();
    }
}
