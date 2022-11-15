<?php

declare(strict_types=1);

namespace Signifly\Struct\Api\Product\Actions;

use Exception;
use Illuminate\Support\Facades\Http;

class ProductEnrichmentInsightsAction
{
    /**
     * ### Product Enrichment Insights
     * This action shows the product enrichment insights.
     *
     * @param  int $id ID of the product to be shown
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
            ])->get("{$baseUrl}/products/{$id}/enrichmentinsights");
        } catch (Exception $e) {
            // Return the error
            return throw new Exception($e->getMessage());
        }
    }
}
