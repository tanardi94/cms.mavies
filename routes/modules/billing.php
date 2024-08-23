<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::prefix('billing')->as('billing.')->group(function() {
    Route::get('/', Controllers\Billing\IndexController::class)->name('index');
});
