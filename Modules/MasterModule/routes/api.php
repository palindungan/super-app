<?php

use Illuminate\Support\Facades\Route;
use Modules\MasterModule\Http\Controllers\MasterModuleController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('mastermodules', MasterModuleController::class)->names('mastermodule');
});
