<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class Accounts
{
    public function getEntry()
    {
        return Dinero::client()
            ->get('/accounts/entry')
            ->json();
    }

    public function getPurchase()
    {
        return Dinero::client()
            ->get('/accounts/purchase')
            ->json();
    }

    public function getDeposit()
    {
        return Dinero::client()
            ->get('/accounts/deposit')
            ->json();
    }

    public function getInternal()
    {
        return Dinero::client()
            ->get('/accounts/internal')
            ->json();
    }

    public function createEntry($number, $name, $vatCode)
    {
        return Dinero::client()
            ->post('/accounts/entry', [
                'number' => $number,
                'name' => $name,
                'vatCode' => $vatCode,
            ])
            ->json();
    }

    public function createDeposit($number, $name, $registrationNumber, $accountNumber, $swiftNumber, $ibanNumber)
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
