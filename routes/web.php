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
Route::get('hello/other',[HelloController::class, 'other']);
