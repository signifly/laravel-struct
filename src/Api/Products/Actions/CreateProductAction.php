<?php

declare(strict_types=1);

namespace Signifly\Struct\Api\Products\Actions;

use Exception;
use Illuminate\Support\Facades\Http;

class CreateProductAction
{
    /**
     * ### Create a product
     * This action creates a new product.
     *
     * @param  array $products Array of products to be created
     * @return \Illuminate\Http\Client\Response
     */
    public static function handle(array $products): \Illuminate\Http\Client\Response
    {
        try {
            // BaseUrl
            $baseUrl = config('struct.base_url');

            // Make the API request
            return Http::withHeaders([
                'Authorization' => config('struct.token'),
            ])->post("{$baseUrl}/products", $products);
        } catch (Exception $e) {
            // Return the error
            return throw new Exception($e->getMessage());
        }
    }
}
