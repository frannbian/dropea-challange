<?php

namespace Tests\Unit\Eloquent\Models;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_a_category_from_factory()
    {
        Category::factory()->create([
            'category' => 'Animals',
        ]);
        $category = Category::first();
        $count = Category::count();
        $this->assertEquals('Animals', $category->category);
        $this->assertEquals(1, $count);
        $this->assertInstanceOf(Category::class, $category);
    }

    public function test_get_a_category_with_attributes()
    {
        Category::factory()->create([
            'category' => 'Animals',
        ]);
        $category = Category::first();
        $this->assertNotEmpty($category->category);
    }
}
