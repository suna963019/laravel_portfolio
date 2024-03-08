<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\MainController;
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

Route::get('/',[BookController::class,'index']);

// Route::get('/rakuten','BookController@rakuten');


// Route::get('/rakuten/add','BookController@rakutenAdd');
// Route::post('/rakuten/add','BookController@rakutenCreate');

Route::get('/book',[BookController::class,'index']);

Route::get('/book/add',[BookController::class,'add']);
Route::post('/book/add','BookController@create');

Route::get('/book/edit','BookController@edit');
Route::post('/book/edit','BookController@update');

Route::get('/book/del','BookController@delete');
Route::post('/book/del','BookController@remove');

Route::get('/book/search','BookController@search');