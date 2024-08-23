<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::prefix('dashboard')
    ->as('dashboard.')
    ->group(function() {
        Route::get('/', Controllers\Dashboard\IndexController::class)->name('index');
    });
