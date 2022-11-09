<?php

declare(strict_types=1);

namespace Signifly\LaravelStruct\Api\Product\Schemas;

class ProductDescriptionSchema
{
    /**
     * Prepare the description for the product
     *
     * @param  string $content      content of the description
     * @param  ?string $code        language code (default is set in the config file)
     * @return array
     */
    public static function make(
        string $content,
        string $code = null,
    ): array {
        // Set the limit of records to be returned
        $languageCode = $code ?? config('laravel-struct.default_language') ?? 'en-GB';

        // Return the response
        return [
            'CultureCode' => $languageCode,
            'Data' => $content,
        ];
    }
}
