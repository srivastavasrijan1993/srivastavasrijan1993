<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 Route::get('record',[App\Http\Controllers\HomeController::class,'record']);
 Route::get('addrecord',[App\Http\Controllers\HomeController::class,'addrecord']);
  Route::get('storagedata',[App\Http\Controllers\HomeController::class,'storagedata']);