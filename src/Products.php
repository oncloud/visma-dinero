<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class Products
{
    /**
     * Get product. Gets Product infomation for the product with the given Id.
     *
     * @return array|mixed
     */
    public function get(string $guid)
    {
        return Dinero::client()
            ->get('/products/'.$guid)
            ->json();
    }

    /**
     * Update product. Updatea an existing product.
     *
     * @return array|mixed
     */
    public function update(string $guid, int $baseAmountValue, int $quantity, int $accountNumber, string $unit,
        string $productNumber = null, string $name = null, string $externalReference = null,
        string $comment = null)
    {
        return Dinero::client()
            ->put('/products/'.$guid, [
                'baseAmountValue' => $baseAmountValue,
                'quantity' => $quantity,
                'accountNumber' => $accountNumber,
                'unit' => $unit,
                'productNumber' => $productNumber,
                'name' => $name,
                'externalReference' => $externalReference,
                'comment' => $comment,
            ])
            ->json();
    }

    /**
     * Delete product. Delete a product.
     *
     * @return array|mixed
     */
    public function delete(string $guid)
    {
        return Dinero::client()
            ->delete('/products/'.$guid)
            ->json();
    }

    /**
     * List products. Retrieve a list of products for the organization ordered by UpdatedAt.
     *
     * @return array|mixed
     */
    public function list(string $fields = null, string $freeTextSeach = null, string $queryFilter = null, string $changesSince = null,
        string $deletedOnly = null, int $page = 0, int $pageSize = 100)
    {
        return Dinero::client()
            ->withQueryParameters([
                'fields' => $fields,
                'freeTextSearch' => $freeTextSeach,
                'queryFilter' => $queryFilter,
                'changesSince' => $changesSince,
                'deletedOnly' => $deletedOnly,
                'page' => $page,
                'pageSize' => $pageSize,
            ])
            ->get('/products')
            ->json();
    }

    /**
     * Create product. Add a new product to organization.
     *
     * @return array|mixed
     */
    public function create(int $baseAmountValue, int $quantity, int $accountNumber, string $unit, string $productNumber = null,
        string $name = null, string $externalReference = null, string $comment = null)
    {
        return Dinero::client()
            ->post('/products', [
                'baseAmountValue' => $baseAmountValue,
                'quantity' => $quantity,
                'accountNumber' => $accountNumber,
                'unit' => $unit,
                'productNumber' => $productNumber,
                'name' => $name,
                'externalReference' => $externalReference,
                'comment' => $comment,
            ])
            ->json();
    }
}
