<?php

declare(strict_types=1);

namespace Signifly\LaravelStruct\Api\Product\Actions;

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
            $baseUrl = config('laravel-struct.base_url');

            // Make the API request
            return Http::withHeaders([
                'Authorization' => config('laravel-struct.token'),
            ])->get("{$baseUrl}/products");
        } catch (Exception $e) {
            // Return the error
            return throw new Exception($e->getMessage());
        }
    }
}
