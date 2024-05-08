<?php

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
});
// Route::get('/edit', [TodoController::class, "edit"])->name('todo.edit');
//Route::post('/{task_id}/update', [TodoController::class, "update"])->name('todo.update');


Route::prefix('/banner')->group(function () {
    Route::get('/', [TodoController::class, "index"])->name('banner')->middleware('auth');
    Route::post('/store', [TodoController::class, "store"])->name('banner.store')->middleware('auth');
    Route::get('/{banner_id}/delete', [TodoController::class, "delete"])->name('banner.delete')->middleware('auth');
    Route::get('/{banner_id}/status', [TodoController::class, "status"])->name('banner.status')->middleware('auth');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
