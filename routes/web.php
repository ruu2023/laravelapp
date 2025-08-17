<?php

use App\Http\Controllers\HelloController;
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
