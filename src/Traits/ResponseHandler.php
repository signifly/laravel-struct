<?php

declare(strict_types=1);

namespace Signifly\LaravelStruct\Traits;

use Illuminate\Http\Client\Response;

/**
 * ### Response Trait
 * This class handles the responses.
 *
 * @package Signifly\LaravelStruct\Traits
 */
trait ResponseHandler
{
    /**
     * ### Response Handler
     * This method handles the response object.
     *
     * @param  \Illuminate\Http\Client\Response $response The response object to be returned
     * @param  bool $returnRawObject Returns the raw response object
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function make(
        mixed $response,
        bool $returnRawObject = false,
    ): array|\Illuminate\Http\Client\Response {
        try {
            // Return the raw object
            if ($returnRawObject) {
                return $response;
            }

            // Return the response
            return $response->json();
        } catch (\Exception $e) {
            // Return the error
            throw new \Exception($e->getMessage());
        }
    }
}
