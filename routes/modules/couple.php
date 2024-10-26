<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::prefix('couples')->as('couple.')->group(function() {
    Route::get('/', Controllers\Couple\IndexController::class)->name('index');
    Route::get('/create', Controllers\Couple\CreateController::class)->name('create');
    Route::post('/store', Controllers\Couple\StoreController::class)->name('store');
    Route::get('{couple}/edit', Controllers\Couple\EditController::class)->name('edit');
    Route::put('{couple}/update', Controllers\Couple\UpdateController::class)->name('update');
    Route::delete('{couple}/destroy', Controllers\Couple\DestroyController::class)->name('destroy');
    Route::get('/datatables', Controllers\Couple\DatatableController::class)->name('datatables');
});
