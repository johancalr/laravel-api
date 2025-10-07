<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Main user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
        ]);
        // Other users
        User::factory()->count(29)->create();
        // Categories
        Category::factory()->count(29)->create();
        // Tags
        Tag::factory()->count(29)->create();
        // Recipes
        Recipe::factory()->count(29)->create();

        // Recipe tags
        $recipes = Recipe::all();
        $tags = Tag::all();
        foreach ($recipes as $recipe) {
            $recipe->tags()->attach($tags->random(rand(1, 5)));
        }
    }
}
