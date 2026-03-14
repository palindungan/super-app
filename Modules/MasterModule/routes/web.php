<?php

use Illuminate\Support\Facades\Route;
use Modules\MasterModule\Http\Controllers\MasterModuleController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('mastermodules', MasterModuleController::class)->names('mastermodule');
});
