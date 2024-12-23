<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Webpage\AlbumController;
use App\Http\Controllers\Webpage\CarouselController;
use App\Http\Controllers\Webpage\ContactInfoController;
use App\Http\Controllers\Webpage\EducationController;
use App\Http\Controllers\Webpage\GallaryController;
use App\Http\Controllers\WebPage\HomeController;
use App\Http\Controllers\Webpage\JobExperienceController;
use App\Http\Controllers\Webpage\LanguageController;
use App\Http\Controllers\Webpage\MessageController;
use App\Http\Controllers\Webpage\PersonalInfoController;
use App\Http\Controllers\Webpage\RecipeCategoryController;
use App\Http\Controllers\Webpage\RecipeController;
use App\Http\Controllers\Webpage\SettingController;
use App\Models\RecipeCategory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login/store', [LoginController::class, 'loginStore'])->name('login.store');

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    // Web-page routes
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::post('setting', [SettingController::class, 'updateSetting'])->name('setting');
    Route::get('app-setting', [SettingController::class, 'appSetting'])->name('app-setting');

    // album route
    Route::get('album/index', [AlbumController::class, 'index'])->name('album.index');
    Route::get('albumcreate', [AlbumController::class, 'create'])->name('album-create');
    Route::post('albumstore', [AlbumController::class, 'store'])->name('album-store');
    Route::put('albumupdate/{id}', [AlbumController::class, 'update'])->name('album-update');
    Route::delete('albumdelete/{id}', [AlbumController::class, 'delete'])->name('album.delete');

    
    // album gallary
    Route::get('allgallary', [GallaryController::class, 'index'])->name('gallary-index');
    Route::get('creategallary', [GallaryController::class, 'create'])->name('gallary-create');
    Route::post('storegallary', [GallaryController::class, 'store'])->name('gallary-store');
    Route::put('updategallary/{id}', [GallaryController::class, 'update'])->name('gallary-update');
    Route::delete('deletegallary/{id}', [GallaryController::class, 'delete'])->name('gallary-delete');

    //recipes routes
    Route::get('recipe-banner', [SettingController::class, 'recipeBanner'])->name('recipe.banner');
    
    //carousel routes
    Route::get('allcarousel', [CarouselController::class, 'index'])->name('all.carousel');
    Route::get('createcarousel', [CarouselController::class, 'create'])->name('create.carousel');
    Route::post('addcarousel', [CarouselController::class, 'store'])->name('add.carousel');
    Route::put('updatecarousel/{id}', [CarouselController::class, 'update'])->name('carousel-update');
    Route::delete('updatecarousel/{id}', [CarouselController::class, 'destroy'])->name('carousel-delete');

    //recipe category routes
    Route::get('allcategory', [RecipeCategoryController::class, 'index'])->name('all.recipe.category');
    Route::get('createrecipecategory', [RecipeCategoryController::class, 'create'])->name('create');
    Route::post('addrecipecategory', [RecipeCategoryController::class, 'store'])->name('add.recipe.category');
    Route::put('updatecategory/{id}', [RecipeCategoryController::class, 'update'])->name('recipe-category-update');
    Route::delete('delete/recipe/category/{id}', [RecipeCategoryController::class, 'destroy'])->name('recipe-category-delete');

    // Recipe routes
    Route::get('allrecipe', [RecipeController::class, 'index'])->name('all.recipe');
    Route::get('recipecreate', [RecipeController::class, 'create'])->name('create.recipe');
    Route::post('addrecipe', [RecipeController::class, 'store'])->name('add.recipe');
    Route::get('recipedetails/{id}', [RecipeController::class, 'show'])->name('recipe-details');
    Route::put('updaterecipe/{id}', [RecipeController::class, 'update'])->name('recipe-update');
    Route::delete('deleterecipe/{id}', [RecipeController::class, 'destroy'])->name('recipe-delete');

    // contact routes
    Route::get('contactinfo', [PersonalInfoController::class, 'index'])->name('contact-info');
    Route::put('updateinfo/{id}', [PersonalInfoController::class, 'update'])->name('update-contact-info');
    Route::post('storecontactinfo', [PersonalInfoController::class, 'store'])->name('store-contact-info');

    // language routes
    Route::get('alllanguage', [LanguageController::class, 'index'])->name('all-language');
    Route::get('createlanguage', [LanguageController::class, 'create'])->name('add-language');
    Route::post('storelanguage', [LanguageController::class, 'store'])->name('language-store');
    Route::put('storelanguage/{id}', [LanguageController::class, 'update'])->name('language-update');
    Route::delete('storelanguage/{id}', [LanguageController::class, 'destroy'])->name('language-delete');

    //Education routes
    Route::get('alleduction',[EducationController::class, 'index'])->name('all-education');
    Route::get('createeduction',[EducationController::class, 'create'])->name('create-education');
    Route::post('storeeducation', [EducationController::class, 'store'])->name('store-education');
    Route::put('updateeducation/{id}', [EducationController::class, 'update'])->name('education-update');
    Route::delete('deleteeducation/{id}', [EducationController::class, 'destroy'])->name('education-delete');
   
    // job objective routes
    Route::get('job-objective', [SettingController::class, 'jobObjective'])->name('job-objective');

    //Experiance routes
    Route::get('allexperiance', [JobExperienceController::class, 'index'])->name('all-experiance');
    Route::get('createexperiance', [JobExperienceController::class, 'create'])->name('create-experiance');
    Route::post('storeexperiance', [JobExperienceController::class, 'store'])->name('store-experiance');
    Route::put('updateexperiance/{id}', [JobExperienceController::class, 'update'])->name('update-experiance');
    Route::delete('deleteexperiance/{id}', [JobExperienceController::class, 'destroy'])->name('job_experience-delete');

    //Message Routes
    Route::get('allmessage', [MessageController::class, 'index'])->name('all-message');
    // Route::get('createmessage', [SettingController::class, 'createMessage'])->name('create-message');
    Route::post('storemessage', [MessageController::class,'store'])->name('store-message');
    // Route::put('updatemessage/{id}', [SettingController::class, 'updateMessage'])->name('update-message');
    Route::delete('deletemessage/{id}', [MessageController::class, 'destroy'])->name('message-delete');


    // Route::resources([
//     'album' => AlbumController::class,
//     'gallary' => GallaryController::class,
//     // more routes for album and gallary goes here...
// ]);

});
