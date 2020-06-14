<?php

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\AnalyticTypeController;
use App\Http\Controllers\Api\PropertyAnalyticController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'property'], function () {
    Route::get('', [PropertyController::class, 'getAll']);
    Route::get('{propertyId}', [PropertyController::class, 'getById']);
    Route::post('', [PropertyController::class, 'create']);
    Route::put('{propertyId}', [PropertyController::class, 'update']);
    Route::delete('{propertyId}', [PropertyController::class, 'delete']);
});


Route::group(['prefix' => 'property-analytic'], function () {
    Route::get('', [PropertyAnalyticController::class, 'getAll']);
    Route::post('', [PropertyAnalyticController::class, 'create']);
    Route::get('{propertyAnalyticId}', [PropertyAnalyticController::class, 'getById']);
    Route::get('summary/{fieldProperty}/{fieldValue}', [PropertyAnalyticController::class, 'getSummaryByField']);
});

Route::group(['prefix' => 'analytic-type'], function () {
    Route::get('', [AnalyticTypeController::class, 'getAll']);
    Route::get('{analyticTypeId}', [AnalyticTypeController::class, 'getById']);
    Route::post('', [AnalyticTypeController::class, 'create']);
    Route::put('{analyticTypeId}', [AnalyticTypeController::class, 'update']);
    Route::delete('{analyticTypeId}', [AnalyticTypeController::class, 'delete']);
});

