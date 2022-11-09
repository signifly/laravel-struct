<?php

/*
 |--------------------------------------------------------------------------
 | Default Configuration
 |--------------------------------------------------------------------------
 |
 | In this section you may define the default configuration for your
 | Struct integration.
 |
 */
return [

    /*
     |--------------------------------------------------------------------------
     | Base URL
     |--------------------------------------------------------------------------
     |
     | This is the base URL of your Struct API instance.
     |
     */
    'base_url' => env('STRUCT_URL'),

    /*
     |--------------------------------------------------------------------------
     | Token
     |--------------------------------------------------------------------------
     |
     | This is the token that will be used to authenticate your requests.
     |
     | You can find your token in the Struct dashboard under:
     |   Settings > API configuration.
     |
     */
    'token' => env('STRUCT_TOKEN'),

    /*
     |--------------------------------------------------------------------------
     | Default Language
     |--------------------------------------------------------------------------
     |
     | This is the default language that will be used for your requests.
     |
     | Note that this can be overwritten in the method call.
     |
     */
    'default_language' => env('STRUCT_DEFAULT_LANGUAGE', 'en-GB'),

    /*
     |--------------------------------------------------------------------------
     | Pagination
     |--------------------------------------------------------------------------
     |
     | Here you may define how many results should be returned. If the number
     | is not defined, the number of results will be the one defined in the
     | Struct API.
     |
     | Note that this value can be overwritten in the method call.
     |
     */
    'per_page' => env('STRUCT_PER_PAGE', null),

];
