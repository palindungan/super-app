<?php

use Illuminate\Support\Facades\Route;
use Modules\AdministratorModule\Http\Controllers\RoleController;

Route::prefix('administrator')->middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class)->names('administrator-roles');
});
