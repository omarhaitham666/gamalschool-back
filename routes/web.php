<?php

// use App\Http\Controllers\TeamController;
use App\Http\Controllers\Web\AuthController as WebAuthController;
use App\Http\Controllers\Web\TeamController as WebTeamController;
use App\HTTP\Controllers\Web\AchievementController as WebAchievementController;
use App\HTTP\Controllers\Web\TabletController as WebTabletController;
use App\HTTP\Controllers\Web\UniformController as WebUniformController;
use App\HTTP\Controllers\Web\MessageController as WebMessageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [WebAuthController::class, 'login'])->name('dashboard.login'); // update system to be make login is the index page
Route::post('/', [WebAuthController::class, 'handle_login'])->name('dashboard.handle.login'); // update system to be make login is the index page


Route::prefix('dashboard')->group(function(){
    Route::middleware('auth')->group(function(){
        //app system log out
        Route::get('logout',[WebAuthController::class,'logout'])->name('logout');
        
        //app utlites controllers 
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
    });
            Route::prefix('Tablet')->group(function(){
                Route::get('all',[WebTabletController::class,'index'])->name('Tablet.index');
                Route::get('create',[WebTabletController::class,'create'])->name('Tablet.create');
                Route::post('store',[WebTabletController::class,'store'])->name('Tablet.store');
                Route::get('{id}/show',[WebTabletController::class,'show'])->name('Tablet.show');
                Route::delete('{id}/delete',[WebTabletController::class,'destroy'])->name('Tablet.destroy');
                Route::get('{id}/edit',[WebTabletController::class,'edit'])->name('Tablet.edit');
                Route::put('{id}/update',[WebTabletController::class,'update'])->name('Tablet.update');
            });
            
            Route::prefix('Uniform')->group(function(){
                Route::get('all',[WebUniformController::class,'index'])->name('Uniform.index');
                Route::get('create',[WebUniformController::class,'create'])->name('Uniform.create');
                Route::post('store',[WebUniformController::class,'store'])->name('Uniform.store');
                Route::get('{id}/show',[WebUniformController::class,'show'])->name('Uniform.show');
                Route::delete('{id}/delete',[WebUniformController::class,'destroy'])->name('Uniform.destroy');
                Route::get('{id}/edit',[WebUniformController::class,'edit'])->name('Uniform.edit');
                Route::put('{id}/update',[WebUniformController::class,'update'])->name('Uniform.update');
            });


            Route::prefix('Message')->group(function(){
                Route::get('all',[WebMessageController::class,'index'])->name('Message.index');
                Route::get('create',[WebMessageController::class,'create'])->name('Message.create');
                Route::post('store',[WebMessageController::class,'store'])->name('Message.store');
                Route::get('{id}/show',[WebMessageController::class,'show'])->name('Message.show');
                Route::delete('{id}/delete',[WebMessageController::class,'destroy'])->name('Message.destroy');
                Route::get('{id}/edit',[WebMessageController::class,'edit'])->name('Message.edit');
                Route::put('{id}/update',[WebMessageController::class,'update'])->name('Message.update');
            });

    });
          






