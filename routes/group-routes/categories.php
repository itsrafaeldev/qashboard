<?php

use App\Http\Controllers\Qashboard\CategoriesController;
use Illuminate\Support\Facades\Route;



Route::prefix('categories')->group(function () {

    Route::get('/', [CategoriesController::class, 'list'])->name('categories.list');

    Route::get('form-create', [CategoriesController::class, 'formCreate'])->name('categories.form-create');

    Route::get('form-edit/{category}', [CategoriesController::class, 'formEdit'])->name('categories.form-edit');

    Route::post('save', [CategoriesController::class, 'save'])->name('categories.save');

    Route::put('update', [CategoriesController::class, 'update'])->name('categories.update');

    Route::delete('{category}', [CategoriesController::class, 'delete'])->name('categories.delete');







});
