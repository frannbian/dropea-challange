<?php

namespace Tests\Unit\Eloquent\Models;

use App\Models\Category;
use App\Models\Entity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EntityModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_a_entity_from_factory()
    {
        $category = Category::factory()->create([
            'category' => 'Animals',
        ]);

        Entity::factory()->create([
            'api' => 'Testing',
            'description' => 'Testing',
            'link' => 'Testing',
            'category_id' => $category->id,
        ]);

        $entity = Entity::first();
        $count = Entity::count();
        $this->assertEquals('Testing', $entity->api);
        $this->assertEquals('Testing', $entity->description);
        $this->assertEquals('Testing', $entity->link);
        $this->assertEquals(1, $category->id);
        $this->assertEquals(1, $count);
        $this->assertInstanceOf(Entity::class, $entity);
    }

    public function test_get_a_category_with_attributes()
    {
        $category = Category::factory()->create([
            'category' => 'Animals',
        ]);

        Entity::factory()->create([
            'api' => 'Testin2sg',
            'description' => 'Testing',
            'link' => 'Testing',
            'category_id' => $category->id,
        ]);

        $entity = Entity::first();
        $this->assertNotEmpty($entity->api);
        $this->assertNotEmpty($entity->description);
        $this->assertNotEmpty($entity->link);
        $this->assertNotEmpty($entity->category_id);
    }
}
