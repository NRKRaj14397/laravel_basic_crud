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


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'App\Http\Controllers\ArticleController@index');
Route::get('/add', 'App\Http\Controllers\ArticleController@addArticles');
Route::post('/add', 'App\Http\Controllers\ArticleController@saveArticles');
Route::get('/delete/{id}', 'App\Http\Controllers\ArticleController@deleteArticles');
Route::get('/edit/{id}', 'App\Http\Controllers\ArticleController@editArticles');
Route::post('/edit/{id}', 'App\Http\Controllers\ArticleController@updateArticle');