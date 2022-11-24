<?php

declare(strict_types=1);

namespace Signifly\Struct\Api\Products;

use Exception;
use Signifly\Struct\Traits\ResponseHandler;
use Signifly\Struct\Api\Products\Actions\ProductAttributeValuesAction;

/**
 * ### Class Attribute Values
 * This class handles all product values related methods
 *
 * @package Signifly\Struct\Api\Products
 */
class AttributeValues
{
    use ResponseHandler;

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
            $request = ProductAttributeValuesAction::handle(id: $id);

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
}
