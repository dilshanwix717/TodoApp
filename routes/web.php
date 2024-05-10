<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;

use Illuminate\Support\Facades\Route;




//Home
Route::get('/home', [HomeController::class, "index"])->name('home');

//Todo
Route::prefix('/todo')->group(function () {
    Route::get('/', [TodoController::class, "index"])->name('todo')->middleware('auth');
    Route::post('/store', [TodoController::class, "store"])->name('todo.store')->middleware('auth');
    Route::get('/{task_id}/delete', [TodoController::class, "delete"])->name('todo.delete')->middleware('auth');
    Route::get('/{task_id}/done', [TodoController::class, "done"])->name('todo.done')->middleware('auth');
    Route::get('/edit', [TodoController::class, "edit"])->name('todo.edit')->middleware('auth');
    Route::post('/{task_id}/update', [TodoController::class, "update"])->name('todo.update')->middleware('auth');
    Route::get('/{task_id}/sub', [TodoController::class, "sub"])->name('todo.sub')->middleware('auth');
    Route::post('/sub/store', [TodoController::class, "subStore"])->name('todo.sub.store')->middleware('auth');
});


// Route::get('/edit', [TodoController::class, "edit"])->name('todo.edit');
//Route::post('/{task_id}/update', [TodoController::class, "update"])->name('todo.update');


// Route::prefix('/banner')->group(function () {
//     Route::get('/', [BannerController::class, "index"])->name('banner')->middleware('auth');
//     Route::post('/store', [BannerController::class, "store"])->name('banner.store')->middleware('auth');
//     Route::get('/{banner_id}/delete', [BannerController::class, "delete"])->name('banner.delete')->middleware('auth');
//     Route::get('/{banner_id}/status', [BannerController::class, "status"])->name('banner.status')->middleware('auth');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
