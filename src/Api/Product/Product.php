<?php

declare(strict_types=1);

namespace Signifly\LaravelStruct\Api\Product;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Signifly\LaravelStruct\Api\Product\Actions\CreateProductAction;

class Product
{
    /**
     * Retrieve all products
     * This route retrieve all products registered
     *
     * @param  int $limit                   limit of products to be returned
     * @param  int $afterId                 id of the product after which the products will be shown
     * @param  bool $includeArchived        include archived products
     * @return mixed
     */
    public static function all(
        int $limit,
        int $afterId = null,
        bool $includeArchived = false
    ): mixed {
        // Set the limit of records to be returned
        $limitOfRecords = $limit ?? config('laravel-struct.per_page') ?? 1000;

        // Make the API request
        $request = Http::withHeaders([
            'Authorization' => config('laravel-struct.token'),
        ])
            ->get(config('laravel-struct.base_url').'/products', [
                'limit' => $limitOfRecords,
                'afterId' => $afterId,
                'includeArchived' => $includeArchived,
            ]);

        // Return the response
        return $request->json();
    }

    /**
     * Show a product
     * This route shows a single product
     *
     * @param  int $id      id of the product to be shown
     * @return mixed
     */
    public static function show(int $id): mixed
    {
        // Make the API request
        $request = Http::withHeaders([
            'Authorization' => config('laravel-struct.token'),
        ])
            ->get(config('laravel-struct.base_url')."/products/{$id}");

        // Return the response
        return $request->json();
    }

    /**
     * Create a product
     * This route creates a product
     *
     * @param  string $productStructureUid          uid of the product structure to be used
     * @param  string $variationDefinitionUid       uid of the variation definition to be used
     * @param  array $categoryIds                   array of category ids to be used
     * @param  int $primaryCategoryId               id of the primary category to be used
     * @param  array $values                        array of properties to be used
     * @return mixed
     */
    public static function create(
        string $productStructureUid,
        string $variationDefinitionUid,
        array $categoryIds,
        int $primaryCategoryId,
        array $values
    ): mixed {
        // Product Array
        $productToBeCreated = [
            [
                'ProductStructureUid' => $productStructureUid,
                'VariationDefinitionUid' => $variationDefinitionUid,
                'CategoryIds' => $categoryIds,
                'PrimaryCategoryId' => $primaryCategoryId,
                'Values' => $values,
            ]
        ];
        // Make the API request
        $request = CreateProductAction::handle(products: $productToBeCreated);

        // Return the response
        return [
            'status' => $request->status(),
            'content' => $request->json(),
        ];
    }

    /**
     * Create a product (RAW mode)
     * This route creates a product with using an array provided as payload
     *
     * @param  array $products      array of products to be created
     * @return mixed
     */
    public static function createRaw(
        array $products
    ): mixed {
        // Make the API request
        $request = CreateProductAction::handle(products: $products);

        // Return the response
        return [
            'status' => $request->status(),
            'content' => $request->json(),
        ];
    }

    /**
     * Edit a product
     * This route edits a product
     *
     * @param  int $id      id of the product to be edited
     * @return mixed
     */
    public static function edit(int $id, array $array): mixed
    {
        // Make the API request
        $request = Http::withHeaders([
            'Authorization' => config('laravel-struct.token'),
        ])
            ->patch(config('laravel-struct.base_url')."/products/{$id}", $array);

        // Return the response
        return $request->json();
    }

    /**
     * Attribute Values
     * This route shows all attribute values of a product
     *
     * @param  int $id      id of the product to be edited
     * @return mixed
     */
    public static function attributeValues(int $id): mixed
    {
        // Make the API request
        $request = Http::withHeaders([
            'Authorization' => config('laravel-struct.token'),
        ])
            ->get(config('laravel-struct.base_url')."/products/{$id}/attributevalues");

        // Return the response
        return $request->json();
    }

    /**
     * Classifications
     * This route shows all classifications of a product
     *
     * @param  int $id      id of the product to be edited
     * @return mixed
     */
    public static function classifications(int $id): mixed
    {
        // Make the API request
        $request = Http::withHeaders([
            'Authorization' => config('laravel-struct.token'),
        ])
            ->get(config('laravel-struct.base_url')."/products/{$id}/classifications");

        // Return the response
        return $request->json();
    }

    /**
     * Enrichment Insights
     * This route shows all enrichment insights of a product
     *
     * @param  int $id      id of the product to be edited
     * @return mixed
     */
    public static function enrichmentInsights(int $id): mixed
    {
        // Make the API request
        $request = Http::withHeaders([
            'Authorization' => config('laravel-struct.token'),
        ])
            ->get(config('laravel-struct.base_url')."/products/{$id}/enrichmentinsights");

        // Return the response
        return $request->json();
    }

    /**
     * References
     * This route shows all references of a product
     *
     * @param  int $id      id of the product to be edited
     * @return mixed
     */
    public static function references(int $id): mixed
    {
        $request = Http::withHeaders([
            'Authorization' => config('laravel-struct.token'),
        ])
            ->get(config('laravel-struct.base_url')."/products/{$id}/references");

        return $request->json();
    }

    /**
     * Variants
     * This route shows all variants of a product
     *
     * @param  int $id      id of the product to be edited
     * @return mixed
     */
    public static function variants(int $id): mixed
    {
        // Make the API request
        $request = Http::withHeaders([
            'Authorization' => config('laravel-struct.token'),
        ])
            ->get(config('laravel-struct.base_url')."/products/{$id}/variants");

        // Return the response
        return $request->json();
    }
}
