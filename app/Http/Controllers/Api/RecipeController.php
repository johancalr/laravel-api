<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller {
    
    public function index() {
        $recipes = Recipe::all();
        return RecipeResource::collection($recipes);
    }

    public function show(Recipe $recipe) {
        $recipe = $recipe->load('user', 'category', 'tags');
        return new RecipeResource($recipe);
    }
}
