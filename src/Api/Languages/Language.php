<?php

declare(strict_types=1);

namespace Signifly\Struct\Api\Languages;

use Exception;
use Throwable;
use Signifly\Struct\Traits\ResponseHandler;
use Signifly\Struct\Api\Languages\Actions\{
    ShowLanguageAction,
    CreateLanguageAction,
    UpdateLanguageAction,
    ShowAllLanguagesAction,
};

/**
 * ### Class Language
 * This class handles all the language related actions
 *
 * @package Signifly\Struct\Api\Language
 */
class Language
{
    use ResponseHandler;

    /**
     * ### Retrieve all languages
     * This method retrieve all languages registered.
     *
     * @param  bool $returnRawObject Returns the raw response object
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function all(
        bool $returnRawObject = false,
    ): array|\Illuminate\Http\Client\Response {
        try {
            // Call the method handler to retrieve all languages
            $request = ShowAllLanguagesAction::handle();

            // Handle the response object
            return ResponseHandler::make(
                response: $request,
                returnRawObject: $returnRawObject,
            );
        } catch (Exception $e) {
            // Return the error
            throw new Exception($e->getMessage());
        }
    }

    /**
     * ### Show a language
     * This method shows a single language.
     *
     * @param  int $id ID of the language to be shown
     * @param  bool $returnRawObject Returns the raw response object
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function show(
        int $id,
        bool $returnRawObject = false,
    ): array|\Illuminate\Http\Client\Response|null {
        try {
            // Call the method handler to show a language
            $request = ShowLanguageAction::handle(id: $id);

            // Handle the response object
            return ResponseHandler::make(
                response: $request,
                returnRawObject: $returnRawObject,
            );
        } catch (Throwable $e) {
            // Return the error
            throw new Exception($e->getMessage());
        }
    }

    /**
     * ### Create a product
     * This method creates a product.
     *
     * @param  string $cultureCode Code of the language to be created
     * @param  string $name Name of the language to be created
     * @param  bool $returnRawObject Returns the raw response object
     * @return int|\Illuminate\Http\Client\Response
     */
    public static function create(
        string $cultureCode,
        string $name,
        bool $returnRawObject = false,
    ): int|\Illuminate\Http\Client\Response {
        try {
            // Language Array
            $languageToBeCreated = [
                    'CultureCode' => $cultureCode,
                    'Name' => $name,
            ];

            // Call the method to create a language
            return self::createRaw(
                language: $languageToBeCreated,
                returnRawObject: $returnRawObject
            );
        } catch (Exception $e) {
            // Return the error
            throw new Exception($e->getMessage());
        }
    }

    /**
     * ### Create a language (RAW mode)
     * This method creates a language using an array provided as payload.
     *
     * @param  array $language Array with the language to be created
     * @param  bool $returnRawObject Returns the raw response object
     * @return int|\Illuminate\Http\Client\Response
     */
    public static function createRaw(
        array $language,
        bool $returnRawObject = false,
    ): int|\Illuminate\Http\Client\Response {
        try {
            // Call the method handler to create a language
            $request = CreateLanguageAction::handle(language: $language);

            // Handle the response object
            return ResponseHandler::make(
                response: $request,
                returnRawObject: $returnRawObject,
            );
        } catch (Exception $e) {
            // Return the error
            throw new Exception($e->getMessage());
        }
    }

    /**
     * ### Update a product
     * This method updates a product.
     *
     * @param  int $id ID of the language to be updated
     * @param  string $cultureCode Code of the language to be updated
     * @param  string $name Name of the language to be updated
     * @param  bool $returnRawObject Returns the raw response object
     * @return null|\Illuminate\Http\Client\Response
     */
    public static function update(
        int $id,
        string $cultureCode,
        string $name,
        bool $returnRawObject = false,
    ): null|\Illuminate\Http\Client\Response {
        try {
            // Language Array
            $languageToBeUpdated = [
                    'Id' => $id,
                    'CultureCode' => $cultureCode,
                    'Name' => $name,
            ];

            // Call the method to update a language
            return self::updateRaw(
                language: $languageToBeUpdated,
                returnRawObject: $returnRawObject
            );
        } catch (Exception $e) {
            // Return the error
            throw new Exception($e->getMessage());
        }
    }

    /**
     * ### Update a language (RAW mode)
     * This method updates a language using an array provided as payload.
     *
     * @param  array $language Array with the language to be updated
     * @param  bool $returnRawObject Returns the raw response object
     * @return null|\Illuminate\Http\Client\Response
     */
    public static function updateRaw(
        array $language,
        bool $returnRawObject = false,
    ): null|\Illuminate\Http\Client\Response {
        try {
            // Call the method handler to update a product
            $request = UpdateLanguageAction::handle(language: $language);

            // Handle the response object
            return ResponseHandler::make(
                response: $request,
                returnRawObject: $returnRawObject,
            );
        } catch (Exception $e) {
            // Return the error
            throw new Exception($e->getMessage());
        }
    }
}
