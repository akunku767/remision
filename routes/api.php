<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ResultController;
use App\Http\Controllers\API\VehicleController;

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/check-connectivity', [AuthController::class, 'checkConnectivity'])->name('api.checkConnectivity');

    Route::group(['prefix' => 'results'], function () {
        Route::get('/', [ResultController::class, 'index'])->name('result.index');
        Route::post('/create', [ResultController::class, 'create'])->name('result.create');
    });

    Route::group(['prefix' => 'vehicles'], function () {
        Route::get('/', [VehicleController::class, 'index'])->name('vehicle.index');
        Route::post('/find', [VehicleController::class, 'find'])->name('vehicle.find');
    });
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
