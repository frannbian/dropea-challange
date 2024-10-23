<?php

namespace App\Console\Commands;

use App\Dtos\EntityDto as EntityDto;
use App\Enums\CategoryEnum;
use App\Integrations\PublicApi\Api\PublicApi;
use App\Services\EntityService;
use Illuminate\Console\Command;

class GetEntitiesCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'entities:get-entities';

    /**
     * The console command description.
     */
    protected $description = 'Get entities from open apis service';

    /**
     * Create a new command instance.
     */
    public function __construct(
        public EntityService $entityService,
        public PublicApi $api,
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @throws ConnectionException
     */
    public function handle(): int
    {
        $this->api
            ->getEntries()
            ->whereIn('category', [CategoryEnum::ANIMALS, CategoryEnum::SECURITY])
            ->each(fn (EntityDto $entityDto) => $this->entityService->saveFromCommand($entityDto));

        return 1;
    }
}
