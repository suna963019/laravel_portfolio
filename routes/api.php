<?php

use App\Http\Controllers\RankingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//test
Route::get('/test',function(){
    return ['ok'];
});
Route::get('/test/add',[RankingController::class,'test']);

//slot
Route::get('/slot/index',[RankingController::class,'slot_index']);
Route::post('/slot/add',[RankingController::class,'slot_add']);

//blockbreaker
Route::get('/blockbreaker/index',[RankingController::class,'blockbreaker_index']);
Route::post('/blockbreaker/add',[RankingController::class,'blockbreaker_add']);
