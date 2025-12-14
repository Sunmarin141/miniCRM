<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\WorkerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/goods',[GoodController::class,'getAllGoods']);

Route::get('/goods/{id}',[GoodController::class,'show']);

Route::post('/worker/login',[WorkerController::class,'index']);



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/client/register',[ClientController::class,'register']);
    Route::post('/client/phone',[ClientController::class,'findByPhone']);
    Route::delete('/worker/logout',[WorkerController::class,'destroy']);
});