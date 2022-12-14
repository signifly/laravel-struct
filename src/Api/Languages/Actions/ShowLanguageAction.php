<?php

declare(strict_types=1);

namespace Signifly\Struct\Api\Languages\Actions;

use Exception;
use Illuminate\Support\Facades\Http;

class ShowLanguageAction
{
    /**
     * ### Show a language
     * This action shows a single language.
     *
     * @param  int $id ID of the language to be shown
     * @return \Illuminate\Http\Client\Response
     */
    public static function handle(int $id): \Illuminate\Http\Client\Response
    {
        try {
            // BaseUrl
            $baseUrl = config('struct.base_url');

            // Make the API request
            return Http::withHeaders([
                'Authorization' => config('struct.token'),
            ])->get("{$baseUrl}/languages/{$id}");
        } catch (Exception $e) {
            // Return the error
            return throw new Exception($e->getMessage());
        }
    }
}
