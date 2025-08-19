<?php

use App\Http\Controllers\Qashboard\CreditCardController;
use Illuminate\Support\Facades\Route;



Route::prefix('credit-cards')->group(function () {

    Route::get('/', [CreditCardController::class, 'list'])->name('credit-cards.list');

    Route::get('form-create', [CreditCardController::class, 'formCreate'])->name('credit-cards.form-create');

    Route::get('form-edit/{creditCard}', [CreditCardController::class, 'formEdit'])->name('credit-cards.form-edit');

    Route::post('save', [CreditCardController::class, 'save'])->name('credit-cards.save');

    Route::put('update', [CreditCardController::class, 'update'])->name('credit-cards.update');

    Route::delete('{creditCard}', [CreditCardController::class, 'delete'])->name('credit-cards.delete');







});
