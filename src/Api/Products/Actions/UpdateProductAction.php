<?php

declare(strict_types=1);

namespace Signifly\Struct\Api\Products\Actions;

use Exception;
use Illuminate\Support\Facades\Http;

class UpdateProductAction
{
    /**
     * ### Update a product
     * This action updates a product.
     *
     * @param  array $products Array of products to be created
     * @param  string $ownerReference Add a reference to the system that creates this classification to be able to distinguish the classification from classifications made by other systems
     * @param  bool $removeCategoriesWithSameOwnerReference Set true if you want to remove existing classifications with the provided ownerReference, which is not part to the supplied classifications
     * @return \Illuminate\Http\Client\Response
     */
    public static function handle(
        array $products,
        string $ownerReference = null,
        bool $removeCategoriesWithSameOwnerReference = false
    ): \Illuminate\Http\Client\Response {
        try {
            // BaseUrl
            $baseUrl = config('struct.base_url');

            // Since Laravel is converting the value of $removeCategoriesWithSameOwnerReference to (bool) int and the Struct API does not accept it, we convert it to text.
            $removeCategoriesWithSameOwnerReferenceString = var_export($removeCategoriesWithSameOwnerReference, true);

            // Make the API request
            return Http::withHeaders([
                'Authorization' => config('struct.token'),
            ])
                ->withBody(
                    json_encode($products),
                    'application/json'
                )
                ->withOptions([
                    'query' => [
                        'ownerReference' => $ownerReference,
                        'removeCategoriesWithSameOwnerReference' => $removeCategoriesWithSameOwnerReferenceString
                    ]
                ])
                ->patch("{$baseUrl}/products");
        } catch (Exception $e) {
            // Return the error
            return throw new Exception($e->getMessage());
        }
    }
}
