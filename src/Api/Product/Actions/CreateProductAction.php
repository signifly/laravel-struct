<?php

declare(strict_types=1);

namespace Signifly\LaravelStruct\Api\Product\Actions;

use Illuminate\Support\Facades\Http;

class CreateProductAction
{
    /**
     * Create a product
     * This route creates a new product
     *
     * @param  array $products      array of products to be created
     * @return mixed
     */
    public static function handle(array $products)
    {
        try {
            // Make the API request
            return Http::withHeaders([
                'Authorization' => config('laravel-struct.token'),
            ])
                ->post(config('laravel-struct.base_url').'/products', $products);
        } catch (\Exception $e) {
            // Return the error
            return $e->getMessage();
        }
    }
}
