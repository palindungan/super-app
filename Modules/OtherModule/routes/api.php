<?php

use Illuminate\Support\Facades\Route;
use Modules\OtherModule\Http\Controllers\OtherModuleController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('othermodules', OtherModuleController::class)->names('othermodule');
});
