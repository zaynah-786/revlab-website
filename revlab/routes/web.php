<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/enginelab', function () {
    return view('enginelab');
});

Route::get('/forums', function () {
    return view('forums');
});

Route::get('/settings', function () {
    return view('settings');
});

Route::get('/account', function () {
    return view('account');
});


