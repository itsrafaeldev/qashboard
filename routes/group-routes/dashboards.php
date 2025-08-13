<?php

use App\Http\Controllers\Qashboard\DashboardController;
use Illuminate\Support\Facades\Route;



Route::prefix('dashboards')->group(function () {

    Route::get('/', [DashboardController::class, 'list'])->name('dashboards.list');

    Route::get('form-create', [DashboardController::class, 'formCreate'])->name('dashboards.form-create');

    Route::get('form-edit/{dashboard}', [DashboardController::class, 'formEdit'])->name('dashboards.form-edit');

    Route::post('save', [DashboardController::class, 'save'])->name('dashboards.save');

    Route::put('update', [DashboardController::class, 'update'])->name('dashboards.update');

    Route::delete('{dashboard}', [DashboardController::class, 'delete'])->name('dashboards.delete');







});
