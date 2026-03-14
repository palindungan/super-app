<?php

use Illuminate\Support\Facades\Route;
use Modules\OtherModule\Http\Controllers\OtherModuleController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('othermodules', OtherModuleController::class)->names('othermodule');
});
