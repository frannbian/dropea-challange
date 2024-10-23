<?php

namespace App\Integrations\PublicApi\Api;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class _Http
{
    public static function boot(): void
    {
        Http::macro('publicApi', function (): PendingRequest {
            $baseUrl = config('public_api.baseUrl');

            return Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->baseUrl($baseUrl);
        });
    }
}
