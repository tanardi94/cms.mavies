<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::prefix('roles')->as('role.')->group(function() {
    Route::get('/', Controllers\Role\IndexController::class)->name('index');
    // Route::get('/create', Controllers\Role\CreateController::class)->name('create');
    // Route::post('/store', Controllers\Role\StoreController::class)->name('store');
    // Route::get('{role}/edit', Controllers\Role\EditController::class)->name('edit');
    // Route::put('{role}/update', Controllers\Role\UpdateController::class)->name('update');
    // Route::delete('{role}/destroy', Controllers\Role\DestroyController::class)->name('destroy');
    // Route::get('/datatables', Controllers\Role\DatatableController::class)->name('datatables');
});
