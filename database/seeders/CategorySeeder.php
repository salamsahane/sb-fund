<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Technology'],
            ['name' => 'Health'],
            ['name' => 'Science'],
            ['name' => 'Education'],
            ['name' => 'Sports'],
            ['name' => 'Entertainment'],
            ['name' => 'Travel'],
            ['name' => 'Food'],
            ['name' => 'Fashion'],
            ['name' => 'Finance'],
        ];

        array_walk($categories, fn($category) => Category::create($category));
    }
}
