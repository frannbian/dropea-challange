<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntityRequest;
use App\Http\Requests\UpdateEntityRequest;
use App\Http\Resources\EntityCollection;
use App\Http\Resources\EntityResource;
use App\Models\Entity;
use App\Services\EntityService;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class EntityController extends Controller
{
    protected EntityService $entityService;

    public function __construct(EntityService $entityService)
    {
        $this->entityService = $entityService;
    }

    public function index(): EntityCollection
    {
        $cacheKey = md5('entities');
        $entities = Cache::tags(['entities'])->remember($cacheKey, 3600, function () {
            return $this->entityService->get();
        });

        return $entities;
    }

    public function show(Entity $entity): EntityResource
    {
        return new EntityResource($entity);
    }

    public function store(StoreEntityRequest $request): JsonResponse
    {
        $entity = $this->entityService->save($request->post());

        Cache::tags('entities')->flush();

        return $entity
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateEntityRequest $request, Entity $entity): JsonResponse|Response
    {
        $entity = $this->entityService->save($request->post(), $entity->id);

        Cache::tags('entities')->flush();

        return $entity
            ->response()
            ->setStatusCode(200);
    }

    public function destroy(Entity $entity)
    {
        $entity->delete();
        Cache::tags('entities')->flush();

        return response(null, 204);
    }
}
