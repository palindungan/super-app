<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;

Route::resource('admins', AdminController::class)->names('admin');
