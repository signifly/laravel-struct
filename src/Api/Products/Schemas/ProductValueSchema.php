<?php

declare(strict_types=1);

namespace Signifly\Struct\Api\Products\Schemas;

/**
 * Class ProductSchema
 * @package Signifly\Struct\Api\Products\Schemas
 */
class ProductValueSchema
{
    /**
     * ### Product Value Schema
     * This method creates a schema for the product value.
     *
     * @param  array $name Name of the product
     * @param  int $primaryImage ID of the primary image
     * @param  array $extraImage IDs of the extra images
     * @return array
     */
    public static function make(
        array $name,
        string $primaryImage,
        array $extraImage,
    ): array {
        // Return the response
        return [
            'Name' => $name,
            'PrimaryImage' => $primaryImage,
            'ExtraImage' => $extraImage,
        ];
    }
}
