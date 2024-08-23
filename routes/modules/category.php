<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::prefix('categories')->as('category.')->group(function() {
    Route::get('/', Controllers\Category\IndexController::class)->name('index');
    Route::get('/create', Controllers\Category\CreateController::class)->name('create');
    Route::post('/store', Controllers\Category\StoreController::class)->name('store');
    Route::get('{category}/edit', Controllers\Category\EditController::class)->name('edit');
    Route::put('{category}/update', Controllers\Category\UpdateController::class)->name('update');
    Route::delete('{category}/destroy', Controllers\Category\DestroyController::class)->name('destroy');
    Route::get('/datatables', Controllers\Category\DatatableController::class)->name('datatables');
});
