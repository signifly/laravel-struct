<?php

declare(strict_types=1);

namespace Signifly\Struct\Traits;

use Exception;
use Throwable;

/**
 * ### Response Trait
 * This class handles the responses.
 *
 * @package Signifly\Struct\Traits
 */
trait ResponseHandler
{
    /**
     * ### Response Handler
     * This method handles the response object.
     *
     * @param  \Illuminate\Http\Client\Response $response The response object to be returned
     * @param  bool $returnRawObject Returns the raw response object
     * @return mixed
     */
    public static function make(
        mixed $response,
        bool $returnRawObject = false,
    ): mixed {
        try {
            // Return the raw object
            if ($returnRawObject) {
                return $response;
            }

            // Return the response
            return $response->json();
        } catch (Throwable $e) {
            // Return the error
            throw new Exception($e->getMessage());
        }
    }
}
