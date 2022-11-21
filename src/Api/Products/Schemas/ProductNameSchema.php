<?php

declare(strict_types=1);

namespace Signifly\Struct\Api\Products\Schemas;

/**
 * Class ProductSchema
 * @package Signifly\Struct\Api\Products\Schemas
 */
class ProductNameSchema
{
    /**
     * ### Product Name Schema
     * This method creates a schema for the product name.
     *
     * @param  string $content      content of the name
     * @param  ?string $code        language code (default is set in the config file)
     * @return array
     */
    public static function make(
        string $content,
        string $code = null,
    ): array {
        // Set the limit of records to be returned
        $languageCode = $code ?? config('struct.default_language') ?? 'en-GB';

        // Return the response
        return [
            'CultureCode' => $languageCode,
            'Data' => $content,
        ];
    }
}
