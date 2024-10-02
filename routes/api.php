<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clothingController;    

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [\App\Http\Controllers\clothingController::class, 'register']);

Route::post('/login', [\App\Http\Controllers\clothingController::class, 'login']);

Route::middleware('auth:sanctum')->post('/logout', [clothingController::class,'logout']);