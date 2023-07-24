<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class Sales
{
    /**
     * List invoices and credit notes
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
            ->get('/sales')
            ->json();
    }

    /**
     * Get default settings. Returns a model containing the users default sales voucher setting preferences. These are
     * the settings that are applied when the user creates a new invoice in Dinero's web app. The user can edit these
     * setting under Settings>InvoiceSettings (Indstillinger>Faktura indstillinger).
     */
    public function getDefaultSettings()
    {
        return Dinero::client()
            ->get('/sales/settings')
            ->json();
    }
}
