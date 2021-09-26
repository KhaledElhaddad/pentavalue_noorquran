<?php

use App\Http\Controllers\DuaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\RemembranceController;
use App\Http\Controllers\SoundController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SurahController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ActionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/surahs', [SurahController::class, 'index']);
Route::get('/readers', [ReaderController::class, 'index']);
Route::get('/readers/{reader}', [ReaderController::class, 'show']);
Route::get('/readers/{reader}/surahs', [ReaderController::class, 'readerWithSurahs']);
Route::get('/remembrances', [RemembranceController::class, 'index']);
Route::get('/duas', [DuaController::class, 'index']);
Route::get('/search', [SearchController::class, 'search']);
Route::get('/notifications', [NotificationController::class, 'index']);
Route::post('/app-setting', [SettingController::class, 'index']);
Route::post('/contact', [PageController::class, 'contactPage']);
Route::get('/privacy-plicy', [PageController::class, 'privacyPage']);
Route::get('/about-us', [PageController::class, 'aboutPage']);
Route::get('/terms-and-condations', [PageController::class, 'termPage']);
Route::get('/listen/{sound}', [ActionController::class, 'increaseListen']);
Route::get('/like/{sound}', [ActionController::class, 'addToFav']);


