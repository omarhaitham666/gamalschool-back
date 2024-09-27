<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('user',function(Request $request){
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::post('logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
// Route::get('users',[UserController::class,'index']);
// Route::get('users/{id}',[UserController::class,'show']);
Route::apiResource('teams', TeamController::class);

