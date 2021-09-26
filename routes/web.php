<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lang/{lang}', function ($lang) {
    $allowed = ['ar', 'en'];

    if (!in_array($lang, $allowed)) {
        return back();
    }

    \Cookie::queue('lang', $lang, 60 * 60 * 360);
    return back();
});
