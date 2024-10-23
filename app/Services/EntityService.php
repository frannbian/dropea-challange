<?php

namespace App\Services;

use App\Dtos\EntityDto;
use App\Http\Resources\EntityCollection;
use App\Http\Resources\EntityResource;
use App\Models\Category;
use App\Models\Entity;

class EntityService
{
    /**
     * Store in database
     */
    public function save(array $data, ?int $id = null): EntityResource
    {
        $entity = Entity::updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'api' => $data['api'],
                'description' => $data['description'],
                'link' => $data['link'],
                'category_id' => $data['category_id'],
            ]
        );

        return new EntityResource($entity);
    }

    /**
     * Store in database
     */
    public function saveFromCommand(EntityDto|array $dto): void
    {
        Entity::updateOrCreate(
            [
                'api' => $dto->api,
                'link' => $dto->link,
                'category_id' => Category::whereCategory($dto->category->value)->first()?->id,
            ],
            [
                'api' => $dto->api,
                'description' => $dto->description,
                'link' => $dto->link,
                'category_id' => Category::whereCategory($dto->category->value)->first()?->id,
            ]
        );
    }

    /**
     * Get entities from database
     */
    public static function get(): EntityCollection
    {
        $entities = Entity::with('category')->paginate(15);

        return new EntityCollection($entities);
    }
}
