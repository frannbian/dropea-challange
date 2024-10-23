<?php

namespace App\Integrations\PublicApi\Api;

use App\Dtos\EntityDto;
use App\Enums\CategoryEnum;
use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PublicApi
{
    /**
     * Get currencies rate from the currency broker
     *
     *
     * @throws ConnectionException
     * @throws Exception
     */
    public function getEntries(): Collection
    {
        $response = Http::publicApi()
            ->get('/entries');


        if (! $response->ok()) {
            //TODO: send notifications to a channel like slack or email advicing API does not working.
            Log::error(message: json_encode(['error' => 'There was an error obtaining entries by command', 'response' => $response->json()]));

            // If api does not work we get static data
            $entries = File::get(base_path('app/Integrations/PublicApi/Mock/entries.json'));
            $json = json_decode(json: $entries, associative: true);

            Http::fake([
                config('public_api.baseUrl') => Http::response(['data' => $json], 200),
            ]);

            $response = Http::publicApi()
                ->get('/entries');
        }

        return $response
            ->collect('entries')
            ->map(fn (array $entity) => new EntityDto(
                api: $entity['API'],
                description: $entity['Description'],
                link: $entity['Link'],
                category: CategoryEnum::tryFrom($entity['Category']) ?? null,
            ));
    }
}
