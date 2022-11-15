<div style="color: #f90">

# ⚠️ WIP - Work in Progress

This package is a work in progress. Please do not use it in production yet.
The features are not stable and the API might change.

</div>

---

<p align="center"><a href="https://github.com/signifly/laravel-struct" target="_blank"><img src="./assets/laravel_struct_logo.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/signifly/laravel-struct"><img src="https://travis-ci.org/signifly/struct.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/signifly/laravel-struct"><img src="https://img.shields.io/packagist/dt/signifly/laravel-struct" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/signifly/laravel-struct"><img src="https://img.shields.io/packagist/v/signifly/laravel-struct" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/signifly/laravel-struct"><img src="https://img.shields.io/packagist/l/signifly/laravel-struct" alt="License"></a>

</p>

# Laravel Struct

This package provides a way to interact with the [Struct PIM](https://struct.com/) API in your Laravel application using a fluent interface.

A more complete documentation [can be found here](https://signifly.notion.site/Laravel-Struct-f8c37dca668e4717a8828d6729a3e185).

## Installation

> **Requires [PHP 8.1+](https://signifly.notion.site/Why-do-we-only-support-PHP-8-1-50fdbe4171934d5ba22c0588a87a19c8)**

Install the package via [composer](https://getcomposer.org/):

```bash
composer require signifly/laravel-struct
```

The package will be registered automatically.

### Publishing files

You can publish the config file with:

```bash
php artisan vendor:publish --tag="config"
```

### Environment variables

Don't forget to add the following environment variables to your `.env` file:

```init
STRUCT_URL=
STRUCT_TOKEN=
```

# Usage

This package was developed with simplicity in mind. It provides a fluent interface to interact with the Struct API, in the most Laravelish style.

It is plug-and-play, and does not require any additional configuration.

Here is the example of a controller that uses the package:

```php
use Signifly\Struct\Api\Product\Product as StructProduct;

...

// Get all products
public function index()
{
    return StructProduct::all(limit: 100);
}

// Get a single product
public function show(int $id)
{
    return StructProduct::show(id: $id);
}

public function store()
{
    return StructProduct::create(
        productStructureUid: Str::uuid(),
        variationDefinitionUid: Str::uuid(),
        primaryCategoryId: 1,
        categoryIds: ['1', '2'],
        values: ProductValueSchema::make(
            name: [
                ProductNameSchema::make(
                    content: 'The best Samsung TV ever produced',
                ),
                ProductNameSchema::make(
                    content: 'Det allerbedste TV Samsung har at byde på',
                    code: 'da-DK',
                ),
                ProductNameSchema::make(
                    content: 'A melhor TV Samsung já produzida',
                    code: 'pt-BR',
                ),
                ProductNameSchema::make(
                    content: 'La mejor TV Samsung que se ha producido',
                    code: 'es-ES',
                ),
                ProductNameSchema::make(
                    content: 'La migliore TV Samsung mai prodotta',
                    code: 'it-IT',
                ),
                ProductNameSchema::make(
                    content: 'De beste Samsung TV ooit geproduceerd',
                    code: 'nl-NL',
                ),
                ProductNameSchema::make(
                    content: 'La meilleure TV Samsung jamais produite',
                    code: 'fr-FR',
                ),
            ],
            primaryImage: 3013,
            extraImage: [2566, 5155, 5664],
        ),
    );
}
```

\*\* Note that you can rename the package if it conflicts with an existing Laravel Model.

# Entities

These are the following entities available in this package:

- Product
- Category
- Languages
