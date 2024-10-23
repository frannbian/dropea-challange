<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions from enums.
        $reflector = new \ReflectionClass('App\Enums\CategoryEnum');

        foreach ($reflector->getConstants() as $constValue) {
            Category::updateOrCreate(['category' => $constValue]);
        }

    }
}
