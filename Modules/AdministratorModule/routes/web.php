<?php

use Illuminate\Support\Facades\Route;
use Modules\AdministratorModule\Http\Controllers\CompanyController;
use Modules\AdministratorModule\Http\Controllers\CurrencyController;
use Modules\AdministratorModule\Http\Controllers\RoleController;

Route::prefix('administrator')->middleware(['auth'])->group(function () {
    Route::resource('companies', CompanyController::class)->names('administrator-companies');
    Route::resource('currencies', CurrencyController::class)->names('administrator-currencies');
    Route::resource('roles', RoleController::class)->names('administrator-roles');
});
