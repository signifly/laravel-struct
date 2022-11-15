<?php

declare(strict_types=1);

namespace Signifly\Struct\Api\Product;

use Exception;
use Signifly\Struct\Traits\ResponseHandler;
use Signifly\Struct\Api\Product\Actions\{
    ShowProductAction,
    CreateProductAction,
    ProductAttributeValuesAction,
    ProductClassificationsAction,
    ProductEnrichmentInsightsAction,
    ProductReferencesAction,
    ProductVariantsAction,
    UpdateProductAction,
    ShowAllProductsAction,
};

/**
 * ### Class Product
 * This class handles all the product related actions
 *
 * @package Signifly\Struct\Api\Product
 */
class Product
{
    use ResponseHandler;

    /**
     * ### Retrieve all products
     * This method retrieve all products registered.
     *
     * @param  int $limit Limit of products to be returned
     * @param  int $afterId ID of the product after which the products will be shown
     * @param  bool $includeArchived Include archived products
     * @param  bool $returnRawObject Returns the raw response object
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function all(
        int $limit,
        int $afterId = null,
        bool $includeArchived = false,
        bool $returnRawObject = false,
    ): array|\Illuminate\Http\Client\Response {
        try {
            // Set the limit of records to be returned
            $limitOfRecords = $limit ?? config('struct.per_page') ?? 1000;

            // Call the method handler to retrieve all products
            $request = ShowAllProductsAction::handle(
                limit: $limitOfRecords,
                afterId: $afterId,
                includeArchived: $includeArchived
            );

            // Handle the response object
            return ResponseHandler::make(
                response: $request,
                returnRawObject: $returnRawObject,
            );
        } catch (Exception $e) {
            // Return the error
            throw new Exception($e->getMessage());
        }
    }

    /**
     * ### Show a product
     * This method shows a single product.
     *
     * @param  int $id ID of the product to be shown
     * @param  bool $returnRawObject Returns the raw response object
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function show(
        int $id,
        bool $returnRawObject = false,
    ): array|\Illuminate\Http\Client\Response {
        try {
            // Call the method handler to show a product
            $request = ShowProductAction::handle(id: $id);

            // Handle the response object
            return ResponseHandler::make(
                response: $request,
                returnRawObject: $returnRawObject,
            );
        } catch (Exception $e) {
            // Return the error
            throw new Exception($e->getMessage());
        }
    }

    /**
     * ### Create a product
     * This method creates a product.
     *
     * @param  string $productStructureUid UID of the product structure to be used
     * @param  string $variationDefinitionUid UID of the variation definition to be used
     * @param  array $categoryIds Array of category ids to be used
     * @param  int $primaryCategoryId ID of the primary category to be used
     * @param  array $values Array of properties to be used
     * @param  bool $returnRawObject Returns the raw response object
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function create(
        string $productStructureUid,
        string $variationDefinitionUid,
        array $categoryIds,
        int $primaryCategoryId,
        array $values,
        bool $returnRawObject = false,
    ): array|\Illuminate\Http\Client\Response {
        try {
            // Product Array
            // The product must be wrapped in an array before sending it to the API
            $productToBeCreated = [
                [
                    'ProductStructureUid' => $productStructureUid,
                    'VariationDefinitionUid' => $variationDefinitionUid,
                    'CategoryIds' => $categoryIds,
                    'PrimaryCategoryId' => $primaryCategoryId,
                    'Values' => $values,
                ]
            ];

            // Call the method handler to create a product
            return CreateProductAction::handle(products: $productToBeCreated);
        } catch (Exception $e) {
            // Return the error
            throw new Exception($e->getMessage());
        }
    }

    /**
     * ### Create a product (RAW mode)
     * This method creates a product using an array provided as payload.
     *
     * @param  array $products Array of products to be created
     * @param  bool $returnRawObject Returns the raw response object
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function createRaw(
        array $products,
        bool $returnRawObject = false,
    ): array|\Illuminate\Http\Client\Response {
        try {
            // Call the method handler to create a product
            $request = CreateProductAction::handle(products: $products);

            // Handle the response object
            return ResponseHandler::make(
                response: $request,
                returnRawObject: $returnRawObject,
            );
        } catch (Exception $e) {
            // Return the error
            throw new Exception($e->getMessage());
        }
    }

    /**
     * ### Update a product (RAW mode)
     * This method updates a product using an array provided as payload.
     *
     * @param  int $id ID of the product to be updated
     * @param  array $product Array of the product to be updated
     * @param  bool $returnRawObject Returns the raw response object
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function updateRaw(
        int $id,
        array $product,
        bool $returnRawObject = false,
    ): array|\Illuminate\Http\Client\Response {
        try {
            // Call the method handler to update a product
            $request = UpdateProductAction::handle(
                id: $id,
                product: $product
            );

            // Handle the response object
            return ResponseHandler::make(
                response: $request,
                returnRawObject: $returnRawObject,
            );
        } catch (Exception $e) {
            // Return the error
            throw new Exception($e->getMessage());
        }
    }

    /**
     * ### Attribute Values
     * This method shows all attribute values of a product.
     *
     * @param  int $id ID of the product to be edited
     * @param  bool $returnRawObject Returns the raw response object
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function attributeValues(
        int $id,
        bool $returnRawObject = false,
    ): array|\Illuminate\Http\Client\Response {
        try {
            // Call the method handler to show the attribute values of a product
            $request = ProductAttributeValuesAction::handle(id: $id);

            // Handle the response object
            return ResponseHandler::make(
                response: $request,
                returnRawObject: $returnRawObject,
            );
        } catch (\Exception $e) {
            // Return the error
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * ### Classifications
     * This method shows all classifications of a product.
     *
     * @param  int $id ID of the product to be edited
     * @param  bool $returnRawObject Returns the raw response object
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function classifications(
        int $id,
        bool $returnRawObject = false,
    ): array|\Illuminate\Http\Client\Response {
        try {
            // Call the method handler to show the classifications of a product
            $request = ProductClassificationsAction::handle(id: $id);

            // Handle the response object
            return ResponseHandler::make(
                response: $request,
                returnRawObject: $returnRawObject,
            );
        } catch (\Exception $e) {
            // Return the error
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * ### Enrichment Insights
     * This method shows all enrichment insights of a product.
     *
     * @param  int $id ID of the product to be edited
     * @param  bool $returnRawObject Returns the raw response object
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function enrichmentInsights(
        int $id,
        bool $returnRawObject = false,
    ): array|\Illuminate\Http\Client\Response {
        try {
            // Call the method handler to show the enrichment insights of a product
            $request = ProductEnrichmentInsightsAction::handle(id: $id);

            // Handle the response object
            return ResponseHandler::make(
                response: $request,
                returnRawObject: $returnRawObject,
            );
        } catch (\Exception $e) {
            // Return the error
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * ### References
     * This method shows all references of a product.
     *
     * @param  int $id ID of the product to be edited
     * @param  bool $returnRawObject Returns the raw response object
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function references(
        int $id,
        bool $returnRawObject = false,
    ): array|\Illuminate\Http\Client\Response {
        try {
            // Call the method handler to show the references of a product
            $request = ProductReferencesAction::handle(id: $id);

            // Handle the response object
            return ResponseHandler::make(
                response: $request,
                returnRawObject: $returnRawObject,
            );
        } catch (\Exception $e) {
            // Return the error
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * ### Variants
     * This method shows all variants of a product.
     *
     * @param  int $id ID of the product to be edited
     * @param  bool $returnRawObject Returns the raw response object
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function variants(
        int $id,
        bool $returnRawObject = false,
    ): array|\Illuminate\Http\Client\Response {
        try {
            // Call the method handler to show the variants of a product
            $request = ProductVariantsAction::handle(id: $id);

            // Handle the response object
            return ResponseHandler::make(
                response: $request,
                returnRawObject: $returnRawObject,
            );
        } catch (\Exception $e) {
            // Return the error
            throw new \Exception($e->getMessage());
        }
    }
}
