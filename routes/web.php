<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RakutenAPIController;
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
Route::get('/book',[BookController::class,'index']);

Route::get('/book/add',[BookController::class,'add']);
Route::post('/book/add',[BookController::class,'create']);

Route::get('/book/edit',[BookController::class,'edit']);
Route::post('/book/edit',[BookController::class,'update']);

Route::get('/book/del',[BookController::class,'delete']);
Route::post('/book/del',[BookController::class,'remove']);

Route::get('/book/search',[BookController::class,'search']);

//楽天API用
Route::get('/rakuten',[RakutenAPIController::class,'']);

Route::get('/rakuten/add',[RakutenAPIController::class,'']);
Route::post('/rakuten/add',[RakutenAPIController::class,'']);