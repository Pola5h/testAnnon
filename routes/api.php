<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('users', UserController::class);
    Route::apiResource('organizations', OrganizationController::class);
    Route::apiResource('contracts', ContractController::class);
});