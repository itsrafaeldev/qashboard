<?php

use App\Http\Controllers\Qashboard\CategoryController;
use Illuminate\Support\Facades\Route;



Route::prefix('categories')->group(function () {

    Route::get('/', [CategoryController::class, 'list'])->name('categories.list');

    Route::get('form-create', [CategoryController::class, 'formCreate'])->name('categories.form-create');

    Route::get('form-edit/{category}', [CategoryController::class, 'formEdit'])->name('categories.form-edit');

    Route::post('save', [CategoryController::class, 'save'])->name('categories.save');

    Route::put('update', [CategoryController::class, 'update'])->name('categories.update');

    Route::delete('{category}', [CategoryController::class, 'delete'])->name('categories.delete');







});
