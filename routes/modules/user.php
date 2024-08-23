<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->as('user.')->group(function() {
    Route::get('/', Controllers\User\IndexController::class)->name('index');
    Route::get('/create', Controllers\User\CreateController::class)->name('create');
    Route::post('/store', Controllers\User\StoreController::class)->name('store');
    Route::get('{user}/edit', Controllers\User\EditController::class)->name('edit');
    Route::put('{user}/update', Controllers\User\UpdateController::class)->name('update');
    Route::delete('{user}/destroy', Controllers\User\DestroyController::class)->name('destroy');
    Route::get('/datatables', Controllers\User\DatatableController::class)->name('datatables');
});
