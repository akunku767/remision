<?php

use Illuminate\Support\Facades\Route;

// Middleware
use App\Http\Middleware\CheckRole;

// Auth
use App\Http\Controllers\AuthController;

// User
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;

// Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\ThresholdController;


// User
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::group(['prefix' => 'pencarian'], function () {
    Route::get('/', [SearchController::class, 'index'])->name('search.index');
    Route::get('/sertifikat/{chassis}/{identity}', [SearchController::class, 'certificate'])->name('search.certificate');
    Route::get('/{chassis}', [SearchController::class, 'vehicle'])->name('search.vehicle');
    Route::get('/{chassis}/{identity}', [SearchController::class, 'test'])->name('search.test');

});


Route::get('/mail', [HomeController::class, 'mail'])->name('home.mail');

// Wajib login
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => [CheckRole::class . ':Admin,Super Admin']], function () {

        // Admin
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        });

        Route::group(['prefix' => 'management'], function () {

            // Vehicle
            Route::group(['prefix' => 'vehicle'], function () {
                Route::get('/', [VehicleController::class, 'index'])->name('admin.management.vehicle.index');
                Route::post('/add', [VehicleController::class, 'add'])->name('admin.management.vehicle.add');
                Route::post('/show/{identity}', [VehicleController::class, 'show'])->name('admin.management.vehicle.show');
                Route::post('/edit/{identity}', [VehicleController::class, 'edit'])->name('admin.management.vehicle.edit');
                Route::post('/delete/{identity}', [VehicleController::class, 'delete'])->name('admin.management.vehicle.delete');
            });

            // Result
            Route::group(['prefix' => 'result'], function () {
                Route::get('/', [ResultController::class, 'index'])->name('admin.management.result.index');
                Route::post('/add', [ResultController::class, 'add'])->name('admin.management.result.add');
                Route::get('/download/{identity}/pdf', [ResultController::class, 'download'])->name('admin.management.result.download');
                Route::post('/show/{identity}', [ResultController::class, 'show'])->name('admin.management.result.show');
                Route::post('/edit/{identity}', [ResultController::class, 'edit'])->name('admin.management.result.edit');
                Route::post('/delete/{identity}', [ResultController::class, 'delete'])->name('admin.management.result.delete');
            });

            // Threshold
            Route::group(['prefix' => 'threshold'], function () {
                Route::get('/', [ThresholdController::class, 'index'])->name('admin.management.threshold.index');
                Route::post('/add', [ThresholdController::class, 'add'])->name('admin.management.threshold.add');
                Route::post('/show/{identity}', [ThresholdController::class, 'show'])->name('admin.management.threshold.show');
                Route::post('/edit/{identity}', [ThresholdController::class, 'edit'])->name('admin.management.threshold.edit');
                Route::post('/delete/{identity}', [ThresholdController::class, 'delete'])->name('admin.management.threshold.delete');
            });
        });
    });
});

// Auth
Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'loginIndex'])->name('auth.login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
