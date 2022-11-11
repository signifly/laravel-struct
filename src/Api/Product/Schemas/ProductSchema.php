<?php

declare(strict_types=1);

namespace Signifly\LaravelStruct\Api\Product\Schemas;

/**
 * Class ProductSchema
 * @package Signifly\LaravelStruct\Api\Product\Schemas
 */
class ProductSchema
{
    /**
     * ### Product Schema
     * This method creates a schema for the product.
     *
     * @param string $productStructureUid UID of the product
     * @param string $variationDefinitionUid UID of the variation
     * @param integer $primaryCategoryId ID of the primary category
     * @param array $categoryIds IDs of the categories
     * @param array $values Values of the product
     * @return array
     */
    public static function make(
        string $productStructureUid,
        string $variationDefinitionUid,
        int $primaryCategoryId,
        array $categoryIds,
        array $values,
    ): array {
        // Return the response
        return [
            'ProductStructureUid' => $productStructureUid,
            'VariationDefinitionUid' => $variationDefinitionUid,
            'CategoryIds' => $categoryIds,
            'PrimaryCategoryId' => $primaryCategoryId,
            'Values' => $values,
        ];
    }
}
