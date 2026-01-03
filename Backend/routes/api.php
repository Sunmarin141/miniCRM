<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StoreGoodPivotController;
use App\Http\Controllers\WorkerController;
use App\Models\StoreGoodPivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Metadata\Group;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/goods',[GoodController::class,'getAllGoods']);

Route::get('/goods/{id}',[GoodController::class,'show']);

Route::post('/worker/login',[WorkerController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/worker/logout',[WorkerController::class,'destroy']);

    Route::prefix('/sale')
        ->group(function(){
            Route::get('/show/{worker}',[SaleController::class,'show']);
            Route::post('/create',[SaleController::class,'create']);
            Route::post('/update',[SaleController::class,'update']);
            Route::delete('/delete',[SaleController::class,'deleteAll']);
            Route::delete('/delete/{worker_id}/{good_id}',[SaleController::class,'deleteCurrent']);
        });
    Route::prefix('/client')
        ->group(function(){
            Route::post('update/{client}',[ClientController::class,'updateBonus']);
            Route::post('register',[ClientController::class,'register']);
            Route::get('{phone}',[ClientController::class,'findByPhone']);
        });
    Route::prefix('/current-good')
        ->group(function(){
            Route::post('updateQuantity',[StoreGoodPivotController::class,'updateQuantity']);
        });
});