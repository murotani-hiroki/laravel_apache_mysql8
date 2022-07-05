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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::any('/', 'App\Http\Controllers\FxController@top');
Route::any('/search', 'App\Http\Controllers\FxController@search');
Route::any('/new', 'App\Http\Controllers\FxController@newModal');
Route::any('/save', 'App\Http\Controllers\FxController@save');
Route::any('/edit', 'App\Http\Controllers\FxController@editModal');
Route::any('/delete', 'App\Http\Controllers\FxController@delete');