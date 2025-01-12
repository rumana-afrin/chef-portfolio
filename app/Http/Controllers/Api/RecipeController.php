<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Http\Resources\RecipeResource;
use App\Models\RecipeCategory;

class RecipeController extends Controller
{
    public function recipeDetails($id)
    {
        $recipe = Recipe::where('id', $id)->with('category')->first(); // Use first() instead of get()
        if (!$recipe) {
            return response()->json(['message' => 'No recipes found'], 404);
        }
        return new RecipeResource($recipe); // Single resource, not collection
    }

    public function recipe()
    {
        $recipes = Recipe::with('category')->get();
        if ($recipes->isEmpty()) {
            return response()->json(['message' => 'No recipes found'], 404);
        }
        return RecipeResource::collection($recipes);
    }

    public function getRecipesByCategory($category)
    {
        $recipeCategory = RecipeCategory::where('category_name', $category)->first();

        if (!$recipeCategory) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        $recipes = Recipe::where('recipe_category_id', $recipeCategory->id)->get();

        return RecipeResource::collection($recipes);
    }

}
