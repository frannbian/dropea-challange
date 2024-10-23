<?php

namespace App\Services;

use App\Dtos\CategoryDto;
use App\Http\Resources\CategoryCollection;
use App\Models\Category;

class CategoryService
{
    /**
     * Store in database
     */
    public function save(CategoryDto $dto): void
    {
        Category::create([
            'category' => $dto->category,
        ]);
    }

    /**
     * Get categories from database
     */
    public static function get(): CategoryCollection
    {
        $categories = Category::paginate(15);

        return new CategoryCollection($categories);
    }
}
