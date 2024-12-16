<?php

use App\Http\Controllers\Auth\LoginController;
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

    Route::resources([
        'gallary' => GallaryController::class,
    ]);

});
