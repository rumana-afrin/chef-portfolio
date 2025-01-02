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
    Route::get('album-create', [AlbumController::class, 'create'])->name('album-create');
    Route::post('album-store', [AlbumController::class, 'store'])->name('album-store');
    Route::put('album-update/{id}', [AlbumController::class, 'update'])->name('album-update');
    Route::delete('album-delete/{id}', [AlbumController::class, 'delete'])->name('album.delete');

    
    // album gallary
    Route::get('all-gallary', [GallaryController::class, 'index'])->name('gallary-index');
    Route::get('create-gallary', [GallaryController::class, 'create'])->name('gallary-create');
    Route::post('store-gallary', [GallaryController::class, 'store'])->name('gallary-store');
    Route::put('update-gallary/{id}', [GallaryController::class, 'update'])->name('gallary-update');
    Route::delete('delete-gallary/{id}', [GallaryController::class, 'delete'])->name('gallary-delete');

    //recipes routes
    Route::get('recipe-banner', [SettingController::class, 'recipeBanner'])->name('recipe.banner');
    
    //carousel routes
    Route::get('all-carousel', [CarouselController::class, 'index'])->name('all.carousel');
    Route::get('create-carousel', [CarouselController::class, 'create'])->name('create.carousel');
    Route::post('add-carousel', [CarouselController::class, 'store'])->name('add.carousel');
    Route::put('update-carousel/{id}', [CarouselController::class, 'update'])->name('carousel-update');
    Route::delete('delete-carousel/{id}', [CarouselController::class, 'destroy'])->name('carousel-delete');

    //recipe category routes
    Route::get('all-category', [RecipeCategoryController::class, 'index'])->name('all.recipe.category');
    Route::get('create-recipe-category', [RecipeCategoryController::class, 'create'])->name('create');
    Route::post('add-recipe-category', [RecipeCategoryController::class, 'store'])->name('add.recipe.category');
    Route::put('update-category/{id}', [RecipeCategoryController::class, 'update'])->name('recipe-category-update');
    Route::delete('delete-recipe-category/{id}', [RecipeCategoryController::class, 'destroy'])->name('recipe-category-delete');

    // Recipe routes
    Route::get('all-recipe', [RecipeController::class, 'index'])->name('all.recipe');
    Route::get('recipe-create', [RecipeController::class, 'create'])->name('create.recipe');
    Route::post('add-recipe', [RecipeController::class, 'store'])->name('add.recipe');
    Route::get('recip-edetails/{id}', [RecipeController::class, 'show'])->name('recipe-details');
    Route::get('edit-recipe/{id}', [RecipeController::class, 'edit'])->name('recipe-edit');
    Route::put('update-recipe/{id}', [RecipeController::class, 'update'])->name('recipe-update');
    Route::delete('delete-recipe/{id}', [RecipeController::class, 'destroy'])->name('recipe-delete');

    // contact routes
    Route::get('contact-info', [PersonalInfoController::class, 'index'])->name('contact-info');
    Route::put('update-info/{id}', [PersonalInfoController::class, 'update'])->name('update-contact-info');
    Route::post('store-contact-info', [PersonalInfoController::class, 'store'])->name('store-contact-info');

    // language routes
    Route::get('all-language', [LanguageController::class, 'index'])->name('all-language');
    Route::get('create-language', [LanguageController::class, 'create'])->name('add-language');
    Route::post('store-language', [LanguageController::class, 'store'])->name('language-store');
    Route::put('update-language/{id}', [LanguageController::class, 'update'])->name('language-update');
    Route::delete('delete-language/{id}', [LanguageController::class, 'destroy'])->name('language-delete');

    //Education routes
    Route::get('all-eduction',[EducationController::class, 'index'])->name('all-education');
    Route::get('create-eduction',[EducationController::class, 'create'])->name('create-education');
    Route::post('store-education', [EducationController::class, 'store'])->name('store-education');
    Route::put('update-education/{id}', [EducationController::class, 'update'])->name('education-update');
    Route::delete('delete-education/{id}', [EducationController::class, 'destroy'])->name('education-delete');
   
    // job objective routes
    Route::get('job-objective', [SettingController::class, 'jobObjective'])->name('job-objective');

    //Experiance routes
    Route::get('all-experiance', [JobExperienceController::class, 'index'])->name('all-experiance');
    Route::get('create-experiance', [JobExperienceController::class, 'create'])->name('create-experiance');
    Route::post('store-experiance', [JobExperienceController::class, 'store'])->name('store-experiance');
    Route::put('update-experiance/{id}', [JobExperienceController::class, 'update'])->name('update-experiance');
    Route::delete('delete-experiance/{id}', [JobExperienceController::class, 'destroy'])->name('job_experience-delete');

    //Message Routes
    Route::get('allmessage', [MessageController::class, 'index'])->name('all-message');
    // Route::get('createmessage', [SettingController::class, 'createMessage'])->name('create-message');
    Route::post('store-message', [MessageController::class,'store'])->name('store-message');
    // Route::put('updatemessage/{id}', [SettingController::class, 'updateMessage'])->name('update-message');
    Route::delete('delete-message/{id}', [MessageController::class, 'destroy'])->name('message-delete');


    // Route::resources([
//     'album' => AlbumController::class,
//     'gallary' => GallaryController::class,
//     // more routes for album and gallary goes here...
// ]);

});
