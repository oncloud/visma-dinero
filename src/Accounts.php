<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class Accounts
{
    /**
     * List entry accounts. Get the list of entry accounts for the organization.
     *
     * @param string|null $fields
     * @param string|null $categoryFilter
     * @return array|mixed
     */
    public function getEntry(string $fields = null, string $categoryFilter = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'fields' => $fields,
                'categoryFilter' => $categoryFilter,
            ])
            ->get('/accounts/entry')
            ->json();
    }

    /**
     * List purchase accounts. Get the list of purchase accounts for the organization.
     *
     * @param string|null $fields
     * @return array|mixed
     */
    public function getPurchase(string $fields = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'fields' => $fields,
            ])
            ->get('/accounts/purchase')
            ->json();
    }

    /**
     * List deposit accounts. Get the list of deposit accounts for the organization.
     *
     * @param string|null $fields
     * @return array|mixed
     */
    public function getDeposit(string $fields = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'fields' => $fields,
            ])
            ->get('/accounts/deposit')
            ->json();
    }

    public function getInternal()
    {
        return Dinero::client()
            ->get('/accounts/internal')
            ->json();
    }

    /**
     * Create entry account. Create a new entry account for the organization.
     *
     * @param int $number
     * @param string $name
     * @param string $vatCode
     * @return array|mixed
     */
    public function createEntry(int $number, string $name, string $vatCode)
    {
        return Dinero::client()
            ->post('/accounts/entry', [
                'number' => $number,
                'name' => $name,
                'vatCode' => $vatCode,
            ])
            ->json();
    }

    /**
     * Create deposit account. Create a new deposit account for the organization.
     *
     * @param int $number
     * @param string $name
     * @param string|null $registrationNumber
     * @param string|null $accountNumber
     * @param string|null $swiftNumber
     * @param string|null $ibanNumber
     * @return array|mixed
     */
    public function createDeposit(int $number, string $name, string $registrationNumber = null, string $accountNumber = null, string $swiftNumber = null, string $ibanNumber = null)
    {
        return Dinero::client()
            ->post('/accounts/deposit', [
                'number' => $number,
                'name' => $name,
                'registrationNumber' => $registrationNumber,
                'accountNumber' => $accountNumber,
                'swiftNumber' => $swiftNumber,
                'ibanNumber' => $ibanNumber,
            ])
            ->json();
    }
}
