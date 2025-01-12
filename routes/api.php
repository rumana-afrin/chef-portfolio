<?php

use App\Http\Controllers\Api\CarouselController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('experiences', [HomeController::class, 'experience']);
Route::get('skill', [HomeController::class, 'skill']);
Route::get('home-setting', [HomeController::class, 'homeSettingData']);
Route::get('recipe-category', [HomeController::class, 'recipeCategories']);
Route::get('personal-info', [HomeController::class, 'personalInfo']);
Route::get('recipe', [RecipeController::class, 'recipe']);
Route::get('recipe/{id}', [RecipeController::class, 'recipeDetails']);
Route::get('/recipes/{category}', [RecipeController::class, 'getRecipesByCategory']);
Route::get('carousel', [CarouselController::class, 'carousel']);
Route::get('all-recipe-page', [SettingController::class, 'allRecipePage']);
Route::get('vegetable-page', [SettingController::class, 'vegetablePage']);
