<?php

declare(strict_types=1);

namespace Signifly\LaravelStruct\Api\Language\Actions;

use Exception;
use Illuminate\Support\Facades\Http;

class CreateLanguageAction
{
    /**
     * ### Create a language
     * This action creates a new language.
     *
     * @param  array $language Array with the language to be created
     * @return \Illuminate\Http\Client\Response
     */
    public static function handle(array $language): \Illuminate\Http\Client\Response
    {
        try {
            // BaseUrl
            $baseUrl = config('laravel-struct.base_url');

            // Make the API request
            return Http::withHeaders([
                'Authorization' => config('laravel-struct.token'),
            ])->post("{$baseUrl}/languages", $language);
        } catch (Exception $e) {
            // Return the error
            return throw new Exception($e->getMessage());
        }
    }
}
