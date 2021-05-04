<?php

use App\Http\Controllers\Dqc841Controller;
use App\Http\Controllers\Dqc84Controller;
use App\Http\Controllers\DqcModelController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('dqc-models', [DqcModelController::class, 'index']);
    Route::post('dqc-model', [DqcModelController::class, 'store']);
    Route::get('edit-dqc-model/{model}', [DqcModelController::class, 'edit']);
    Route::patch('update-dqc-model/{model}', [DqcModelController::class, 'update']);
    Route::delete('dqc-models/{model}', [DqcModelController::class, 'destroy']);

    Route::get('dqc-84', [Dqc84Controller::class, 'index']);
    Route::post('dqc-84', [Dqc84Controller::class, 'store']);
    Route::get('edit-dqc-84/{model}', [Dqc84Controller::class, 'edit']);
    Route::patch('update-dqc-84/{model}', [Dqc84Controller::class, 'update']);
    Route::delete('dqc-84/{model}', [Dqc84Controller::class, 'destroy']);
    Route::get('get-models', [Dqc84Controller::class, 'getModels']);

    Route::get('dqc-841', [Dqc841Controller::class, 'index']);
    Route::post('dqc-841', [Dqc841Controller::class, 'store']);
    Route::get('edit-dqc-841/{model}', [Dqc841Controller::class, 'edit']);
    Route::patch('update-dqc-841/{model}', [Dqc841Controller::class, 'update']);
    Route::delete('dqc-841/{model}', [Dqc841Controller::class, 'destroy']);
    Route::get('get-dqc84', [Dqc841Controller::class, 'getDqc84']);
    Route::post('report-list', [Dqc841Controller::class, 'reportList']);
});
