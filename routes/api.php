<?php

use App\Http\Controllers\DqcModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('dqc-models', [DqcModelController::class, 'index']);
    Route::post('dqc-model', [DqcModelController::class, 'store']);
    Route::get('edit-dqc-model/{model}', [DqcModelController::class, 'edit']);
    Route::patch('update-dqc-model/{model}', [DqcModelController::class, 'update']);
    Route::delete('dqc-models/{model}', [DqcModelController::class, 'destroy']);
});
