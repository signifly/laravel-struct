<?php

declare(strict_types=1);

namespace Signifly\Struct\Api\Products\Actions;

use Exception;
use Illuminate\Support\Facades\Http;

class ShowAllProductsAction
{
    /**
     * ### Show all products
     * This action shows all products.
     *
     * @param  int $limit Limit of products to be returned
     * @param  int $afterId ID of the product after which the products will be shown
     * @param  bool $includeArchived Include archived products
     * @return \Illuminate\Http\Client\Response
     */
    public static function handle(
        int $limit,
        int $afterId = null,
        bool $includeArchived = false
    ): \Illuminate\Http\Client\Response {
        try {
            // BaseUrl
            $baseUrl = config('struct.base_url');

            // Make the API request
            return Http::withHeaders([
                'Authorization' => config('struct.token'),
            ])->get("{$baseUrl}/products", [
                'limit' => $limit,
                'afterId' => $afterId,
                'includeArchived' => $includeArchived
            ]);
        } catch (Exception $e) {
            // Return the error
            return throw new Exception($e->getMessage());
        }
    }
}
