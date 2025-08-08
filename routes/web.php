<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.list');
});

Route::group([], function () {
    include __DIR__ . '/group-routes/categories.php';
});
