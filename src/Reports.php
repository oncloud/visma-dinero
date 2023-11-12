<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class Reports
{
    /**
     * Get saldo balance report
     *
     * @return mixed
     */
    public function getSaldoBalanceReport(string $accountYear, string $showZeroAccount = null, string $showAccountNo = null,
        string $includeSummeryAccount = null, string $includeLedgerEntries = null, string $showVatType = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'showZeroAccount' => $showZeroAccount,
                'showAccountNo' => $showAccountNo,
                'includeSummeryAccount' => $includeSummeryAccount,
                'includeLedgerEntries' => $includeLedgerEntries,
                'showVatType' => $showVatType,
            ])
            ->get($accountYear.'/reports/saldo')
            ->json();
    }

    /**
     * Get result report
     *
     * @return mixed
     */
    public function getResultReport(string $accountYear, bool $showZeroAccount = false, bool $showAccountNo = false,
        bool $includeSummeryAccount = false, bool $includeLedgerEntries = false, bool $showVatType = false)
    {
        return Dinero::client()
            ->withQueryParameters([
                'showZeroAccount' => $showZeroAccount ? 'true' : 'false',
                'showAccountNo' => $showAccountNo ? 'true' : 'false',
                'includeSummeryAccount' => $includeSummeryAccount ? 'true' : 'false',
                'includeLedgerEntries' => $includeLedgerEntries ? 'true' : 'false',
                'showVatType' => $showVatType ? 'true' : 'false',
            ])
            ->get($accountYear.'/reports/result')
            ->json();
    }

    /**
     * Get Primo balance report
     *
     * @return mixed
     */
    public function getPrimoBalanceReport(string $accountYear, string $showZeroAccount = null, string $showAccountNo = null,
        string $includeSummeryAccount = null, string $showVatType = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'showZeroAccount' => $showZeroAccount,
                'showAccountNo' => $showAccountNo,
                'includeSummeryAccount' => $includeSummeryAccount,
                'showVatType' => $showVatType,
            ])
            ->get($accountYear.'/reports/primo')
            ->json();
    }

    /**
     * Get balance report
     *
     * @return mixed
     */
    public function getBalanceReport(string $accountYear, string $showZeroAccount = null, string $showAccountNo = null,
        string $includeSummeryAccount = null, string $includeLedgerEntries = null, string $showVatType = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'showZeroAccount' => $showZeroAccount,
                'showAccountNo' => $showAccountNo,
                'includeSummeryAccount' => $includeSummeryAccount,
                'includeLedgerEntries' => $includeLedgerEntries,
                'showVatType' => $showVatType,
            ])
            ->get($accountYear.'/reports/balance')
            ->json();
    }
}
