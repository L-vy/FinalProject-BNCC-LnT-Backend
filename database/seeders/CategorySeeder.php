<?php

namespace Database\Seeders;

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
            ['name' => 'Fantasy', 'slug' => 'Fantasy'],
            ['name' => 'Thriller', 'slug' => 'Thriller'],
            ['name' => 'Romance', 'slug' => 'Romance'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
