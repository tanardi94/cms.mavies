<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::prefix('events')->as('event.')->group(function() {
    Route::get('/', Controllers\Event\IndexController::class)->name('index');
    Route::get('/create', Controllers\Event\CreateController::class)->name('create');
    Route::post('/store', Controllers\Event\StoreController::class)->name('store');
    Route::get('{event}/edit', Controllers\Event\EditController::class)->name('edit');
    Route::put('{event}/update', Controllers\Event\UpdateController::class)->name('update');
    Route::delete('{event}/destroy', Controllers\Event\DestroyController::class)->name('destroy');
    Route::get('/datatables', Controllers\Event\DatatableController::class)->name('datatables');
});
