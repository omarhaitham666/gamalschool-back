<?php

use App\Http\Controllers\TeamController;
use App\Http\Controllers\Web\AuthController as WebAuthController;
use App\Http\Controllers\Web\TeamController as WebTeamController;
use App\HTTP\Controllers\Web\AchievementController as WebAchievementController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });
Route::prefix('Team')->group(function(){
Route::get('all',[WebTeamController::class,'index'])->name('Team.index');
Route::get('create',[WebTeamController::class,'create'])->name('Team.create');
Route::post('store',[WebTeamController::class,'store'])->name('Team.store');
Route::get('{id}/show',[WebTeamController::class,'show'])->name('Team.show');
Route::delete('{id}/delete',[WebTeamController::class,'destroy'])->name('Team.destroy');
Route::get('{id}/edit',[WebTeamController::class,'edit'])->name('Team.edit');
Route::put('{id}/update',[WebTeamController::class,'update'])->name('Team.update');
});

Route::prefix('Achievement')->group(function(){
    Route::get('all',[WebAchievementController::class,'index'])->name('Achievement.index');
    Route::get('create',[WebAchievementController::class,'create'])->name('Achievement.create');
    Route::post('store',[WebAchievementController::class,'store'])->name('Achievement.store');
    Route::get('{id}/show',[WebAchievementController::class,'show'])->name('Achievement.show');
    Route::delete('{id}/delete',[WebAchievementController::class,'destroy'])->name('Achievement.destroy');
    Route::get('{id}/edit',[WebAchievementController::class,'edit'])->name('Achievement.edit');
    Route::put('{id}/update',[WebAchievementController::class,'update'])->name('Achievement.update');
    });
    


// Route::prefix('dashboard')->group(function(){
//     Route::get('/login',[WebAuthController::class,'login'])->name('dashboard.login');
//     Route::middleware('auth')->group(function(){

//     });
// });

// Route::get('/login',[WebAuthController::class,'login'])->name('Dashboard.login');


Route::get('/login', [WebAuthController::class, 'login'])->name('dashboard.login');



