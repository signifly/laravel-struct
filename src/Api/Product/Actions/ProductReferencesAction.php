<?php

declare(strict_types=1);

namespace Signifly\LaravelStruct\Api\Product\Actions;

use Exception;
use Illuminate\Support\Facades\Http;

class ProductReferencesAction
{
    /**
     * ### Product References
     * This action shows the product references.
     *
     * @param  int $id ID of the product to be shown
     * @return \Illuminate\Http\Client\Response
     */
    public static function handle(int $id): \Illuminate\Http\Client\Response
    {
        try {
            // BaseUrl
            $baseUrl = config('laravel-struct.base_url');

            // Make the API request
            return Http::withHeaders([
                'Authorization' => config('laravel-struct.token'),
            ])->get("{$baseUrl}/products/{$id}/references");
        } catch (Exception $e) {
            // Return the error
            return throw new Exception($e->getMessage());
        }
    }
}
