<?php

use App\Http\Controllers\AssetItemController;
use App\Http\Controllers\AssetTransaction\AssetTransactionItemController;
use App\Http\Controllers\AssetTransactionController;
use App\Http\Controllers\AssetTransactionItemController as ControllersAssetTransactionItemController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');

    Route::resource('asset_transactions.asset_transaction_items', AssetTransactionItemController::class);
    Route::resource('asset_transactions', AssetTransactionController::class);

    Route::resource('asset_transaction_items', ControllersAssetTransactionItemController::class);

    Route::get('asset_items/exportExcel', [AssetItemController::class, 'exportExcel'])->name('asset_items.exportExcel');
    Route::resource('asset_items', AssetItemController::class);
});
