<?php
// use App\Http\Controllers\TeamController;
use App\Http\Controllers\API\TeamApiController as APITeamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('user',function(Request $request){
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::post('logout',[AuthController::class,'logout'])->middleware('auth:sanctum');


Route::apiResource('teams', APITeamController::class);



// 

    // Route لتخزين بيانات الخدمة (POST)
    Route::post('/services', [ServiceController::class, 'store']);

    // Route لاسترجاع جميع الخدمات (GET)
    Route::get('/services', [ServiceController::class, 'index']);

    // Route لتحديث بيانات خدمة معينة (PUT/PATCH)
    Route::put('/services/{id}', [ServiceController::class, 'update']);

    // Route لحذف خدمة معينة (DELETE)
    Route::delete('/services/{id}', [ServiceController::class, 'destroy']);

