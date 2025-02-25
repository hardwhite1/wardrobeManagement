<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
    Route::get('/clothing', [ClothingController::class, 'index']);
    Route::post('/clothing', [ClothingController::class, 'store']);
    Route::get('/clothing/{id}', [ClothingController::class, 'show']);
    Route::put('/clothing/{id}', [ClothingController::class, 'update']);
    Route::delete('/clothing/{id}', [ClothingController::class, 'destroy']);
});
