<?php

namespace Tests\Unit\Eloquent\Models;

use App\Integrations\PublicApi\Api\PublicApi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection as SupportCollection;
use Tests\TestCase;

class PublicApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_api_service()
    {
        $publicApi = new PublicApi;
        $entries = $publicApi->getEntries();
        $this->assertInstanceOf(SupportCollection::class, $entries);
    }
}
