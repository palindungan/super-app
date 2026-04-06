<?php

use Illuminate\Support\Facades\Route;
use Modules\AdministratorModule\Http\Controllers\Company\BranchController;
use Modules\AdministratorModule\Http\Controllers\CompanyController;
use Modules\AdministratorModule\Http\Controllers\CurrencyController;
use Modules\AdministratorModule\Http\Controllers\RoleController;

Route::prefix('administrator')->middleware(['auth'])->name('administrator.')->group(function () {
    Route::resource('companies.branches', BranchController::class);
    Route::resource('companies', CompanyController::class);

    Route::get('currencies/select2', [CurrencyController::class, 'select2'])->name('currencies.select2');
    Route::resource('currencies', CurrencyController::class);

    Route::resource('roles', RoleController::class);
});
