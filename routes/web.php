<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController as ControllersPropertyController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::prefix('/legendeimmobiliere/biens')->controller(ControllersPropertyController::class)->name('property.')->group(function () {
    $idRegex = '[0-9]+';
    $slugRegex = '[0-9a-z\-]+';
    Route::get('/', 'index')->name('index');
    Route::get('/legendeimmobiliere/{slug}/{property}', 'show')->name('show')->where([
        'slug' => $slugRegex,
        'property' => $idRegex
    ]);
    Route::post('/legendeimmobiliere/{property}/contact', 'contact')->name('contact')->where([
        'property' => $idRegex
    ]);
});

Route::get('/legendeimmobiliere/admin/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/legendeimmobiliere/admin/login', [AuthController::class, 'authentificate']);
Route::delete('/legendeimmobiliere/admin/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('/legendeimmobiliere/admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('index');
    Route::resource('legendeimmobiliere/property', PropertyController::class)->except('show');
    Route::resource('legendeimmobiliere/option', OptionController::class)->except('show');
});