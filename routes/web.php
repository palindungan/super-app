<?php

use App\Http\Controllers\AssetCategoryController;
use App\Http\Controllers\AssetItemController;
use App\Http\Controllers\AssetStatusController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
});

Route::resource('asset_items', AssetItemController::class);
Route::resource('asset_categories', AssetCategoryController::class);
Route::resource('asset_statuses', AssetStatusController::class);
