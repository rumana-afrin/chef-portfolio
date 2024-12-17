<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Webpage\AlbumController;
use App\Http\Controllers\Webpage\GallaryController;
use App\Http\Controllers\WebPage\HomeController;
use App\Http\Controllers\Webpage\SettingController;
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

// Route::resources([
//     'album' => AlbumController::class,
//     'gallary' => GallaryController::class,
//     // more routes for album and gallary goes here...
// ]);

});
