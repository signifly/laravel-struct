<?php

declare(strict_types=1);

namespace Signifly\Struct\Api\Categories;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Category
{
    /**
     * Retrieve all categories
     * This route retrieve all categories registered
     *
     * @return Response
     */
    public static function all(): Response
    {
        // Make the API request
        $request = Http::withHeaders([
            'Authorization' => config('struct.token'),
        ])
            ->get(config('struct.base_url').'/categories');

        // Return the response
        return $request->json();
    }

    /**
     * Show a category
     * This route shows a single category
     *
     * @param  int $id - id of the category to be shown
     * @return Response
     */
    public static function show(int $id): Response
    {
        // Make the API request
        $request = Http::withHeaders([
            'Authorization' => config('struct.token'),
        ])
            ->get(config('struct.base_url')."/categories/{$id}");

        // Return the response
        return $request->json();
    }
}
