<?php

use Illuminate\Support\Facades\Route;
use Modules\AdministratorModule\Http\Controllers\AdministratorModuleController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('administratormodules', AdministratorModuleController::class)->names('administratormodule');
});
