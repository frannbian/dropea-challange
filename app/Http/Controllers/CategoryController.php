<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): CategoryCollection
    {
        $cacheKey = md5('categories');
        $categories = Cache::tags(['categories'])->remember($cacheKey, 3600, function () {
            return $this->categoryService->get();
        });

        return $categories;
    }

    public function show(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }
}
