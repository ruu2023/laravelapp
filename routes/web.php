<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PersonController;
use App\Http\Middleware\HelloMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



// Route::get('hello',HelloController::class);
Route::get('hello',[HelloController::class, 'index']);
Route::post('hello',[HelloController::class, 'post']);
Route::get('hello/add',[HelloController::class, 'add']);
Route::post('hello/add',[HelloController::class, 'create']);
Route::get('hello/edit', [HelloController::class, 'edit']);
ROute::post('hello/edit', [HelloController::class, 'update']);
ROute::get('hello/del', [HelloController::class, 'del']);
ROute::post('hello/del', [HelloController::class, 'remove']);
ROute::get('hello/show', [HelloController::class, 'show']);
Route::get('hello/session', [HelloController::class, 'ses_get']);
Route::post('hello/session', [HelloController::class, 'ses_put']);

// PersonController
Route::get('person', [PersonController::class, 'index']);
Route::get('person', [PersonController::class, 'index']);
Route::get('person/find', [PersonController::class, 'find']);
Route::post('person/find', [PersonController::class, 'search']);
Route::get('person/add', [PersonController::class, 'add']);
Route::post('person/add', [PersonController::class, 'create']);
Route::get('person/edit', [PersonController::class, 'edit']);
Route::post('person/edit', [PersonController::class, 'update']);
Route::get('person/del', [PersonController::class, 'del']);
Route::post('person/del', [PersonController::class, 'remove']);

// BoardController
Route::get('board', [BoardController::class, 'index']);
Route::get('board/add', [BoardController::class, 'add']);
Route::post('board/add', [BoardController::class, 'create']);
