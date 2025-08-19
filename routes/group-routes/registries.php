<?php

use App\Http\Controllers\Qashboard\RegistryController;
use Illuminate\Support\Facades\Route;



Route::prefix('registries')->group(function () {

    Route::get('/', [RegistryController::class, 'list'])->name('registries.list');

    Route::get('form-create/expenses', [RegistryController::class, 'formCreateExpenses'])->name('registries.form-create-expenses');
    Route::get('form-create/revenues', [RegistryController::class, 'formCreateRevenues'])->name('registries.form-create-revenues');


    Route::get('form-edit/{registry}', [RegistryController::class, 'formEdit'])->name('registries.form-edit');

    Route::post('save', [RegistryController::class, 'updateOrCreateRegistry'])->name('registries.save');


    Route::put('update', [RegistryController::class, 'update'])->name('registries.update');

    Route::delete('{registry}', [RegistryController::class, 'delete'])->name('registries.delete');







});
