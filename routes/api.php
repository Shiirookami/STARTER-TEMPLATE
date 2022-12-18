<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookController;



Route::middleware('auth:sanctum')->group(function(){
    Route::get('books',[BookController::class,'books']);
    Route::post('book/create',[BookController::class,'create']);
    Route::post('book/update/{id}', [BookController::class,'update']);
    Route::delete('book/delete/{id}', [BookController::class,'delete']);
});
Route::post('login',[AuthController::class,'login']);
