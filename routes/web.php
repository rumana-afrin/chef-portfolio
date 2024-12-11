<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WebPage\HomeController;
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

Route::post('dashboard', [LoginController::class, 'index'])->name('dashboard');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('login', [LoginController::class, 'login'])->name('login');

//web-page routes
Route::get('home',[HomeController::class, 'index'])->name('home');