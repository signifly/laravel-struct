<?php

declare(strict_types=1);

namespace Signifly\Struct\Api\Product\Actions;

use Exception;
use Illuminate\Support\Facades\Http;

class UpdateProductAction
{
    /**
     * ### Update a product
     * This action updates a product.
     *
     * @param  int $id ID of the product to be updated
     * @param  array $products Array of products to be created
     * @return \Illuminate\Http\Client\Response
     */
    public static function handle(
        int $id,
        array $product,
    ): \Illuminate\Http\Client\Response {
        try {
            // BaseUrl
            $baseUrl = config('struct.base_url');

            // Make the API request
            return Http::withHeaders([
                'Authorization' => config('struct.token'),
            ])->post("{$baseUrl}/products/{$id}", $product);
        } catch (Exception $e) {
            // Return the error
            return throw new Exception($e->getMessage());
        }
    }
}
