<?php

use Illuminate\Support\Facades\Route;
use Modules\AdministratorModule\Http\Controllers\AdministratorModuleController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('administratormodules', AdministratorModuleController::class)->names('administratormodule');
});
