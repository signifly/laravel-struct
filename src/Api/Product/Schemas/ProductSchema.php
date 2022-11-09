<?php

declare(strict_types=1);

namespace Signifly\LaravelStruct\Api\Product\Schemas;

class ProductSchema
{
    /**
     * Prepare the product for the
     *
     * @param string $productStructureUid       id of the product
     * @param string $variationDefinitionUid    id of the variation
     * @param integer $primaryCategoryId        id of the primary category
     * @param array $categoryIds                ids of the categories
     * @param array $values                     values of the product
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
