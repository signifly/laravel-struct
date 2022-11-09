<?php

declare(strict_types=1);

namespace Signifly\LaravelStruct\Api\Product;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class ProductStructure
{
    /**
     * Retrieve all product structures
     * This route retrieve all product structures registered
     *
     * @return Response
     */
    public static function all(): Response
    {
        // Make the API request
        $request = Http::withHeaders([
            'Authorization' => config('laravel-struct.token'),
        ])
            ->get(config('laravel-struct.base_url').'/productstructure');

        // Return the response
        return $request->json();
    }

    /**
     * Show a product structure
     * This route shows a single product structure
     *
     * @param  int $id - id of the product structure to be shown
     * @return Response
     */
    public static function show(int $id): Response
    {
        // Make the API request
        $request = Http::withHeaders([
            'Authorization' => config('laravel-struct.token'),
        ])
            ->get(config('laravel-struct.base_url')."/productstructure/{$id}");

        // Return the response
        return $request->json();
    }
}
