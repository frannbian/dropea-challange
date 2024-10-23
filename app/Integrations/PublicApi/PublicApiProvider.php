<?php

namespace App\Integrations\PublicApi;

use App\Integrations\PublicApi\Api\_Http;

class PublicApiProvider
{
    public static function boot(): void
    {
        _Http::boot();
    }

    public function __construct()
    {
        _Http::boot();
    }
}
