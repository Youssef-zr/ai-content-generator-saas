<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Strategy",
            "Healthcare",
            "Article",
            "Images",
            "Personal tools",
            "Brainstorming tools",
            "Digital Ad copy",
            "Social media tools",
            "E-Commerce",
            "Blog tools",
        ];
        foreach ($categories as $category) {
            Category::create(['title' => $category]);
        }
    }
}
