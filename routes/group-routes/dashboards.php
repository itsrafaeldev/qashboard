<?php

use App\Http\Controllers\Qashboard\DashboardController;
use Illuminate\Support\Facades\Route;



Route::prefix('dashboards')->group(function () {

    Route::get('/', [DashboardController::class, 'list'])->name('dashboards.list');
    Route::get('data', [DashboardController::class, 'getDataCharts'])->name('dashboards.data');

});
