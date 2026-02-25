<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth/login');
});

// Route::get('/register', function () {
//     return view('auth/register');
// });

Route::get('/', function () {
    return view('components/layouts/master_1/main');
});
