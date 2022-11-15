<?php

declare(strict_types=1);

namespace Signifly\LaravelStruct\Api\Language\Actions;

use Exception;
use Illuminate\Support\Facades\Http;

class ShowAllLanguagesAction
{
    /**
     * ### Show all languages
     * This action shows all languages.
     *
     * @return \Illuminate\Http\Client\Response
     */
    public static function handle(): \Illuminate\Http\Client\Response
    {
        try {
            // BaseUrl
            $baseUrl = config('laravel-struct.base_url');

            // Make the API request
            return Http::withHeaders([
                'Authorization' => config('laravel-struct.token'),
            ])->get("{$baseUrl}/languages");
        } catch (Exception $e) {
            // Return the error
            return throw new Exception($e->getMessage());
        }
    }
}
