<?php

use App\Helpers\NotificationHelper;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'guest'], function() {
    Route::get('/', Controllers\Login\IndexController::class)->name('auth.login.index');
    Route::get('/{social}/auth', Controllers\Login\IndexSocialController::class)->name('auth.social.redirect');
    Route::get('/{social}/auth/callback', Controllers\Login\SocialAuthController::class)->name('auth.social.login');
    Route::get('/register', Controllers\Login\IndexRegisterController::class)->name('auth.register.index');
    Route::post('/login', Controllers\Login\LoginController::class)->name('auth.login.post');
    Route::post('/register', Controllers\Login\RegisterController::class)->name('auth.register.post');
});

Route::post('/logout', Controllers\Login\LogoutController::class)->name('auth.logout');

Route::get('/notify', function() {
    $errors = collect([1,2,3]);
    $message = "<ul>";
    foreach ($errors->all() as $error) {
        $message .= "<li>$error</li>";
    }
    $message .= "</ul>";
    $notification = [
        'message' => $message,
        'alert-type' => 'error',
    ];
    // return redirect()->route('pages.dashboard.index')->with(NotificationHelper::notifyErrorList($errors));
});

Route::prefix('pages')->middleware('auth')->as('pages.')->group(function () {
    Route::get('/profile', Controllers\Login\ProfileController::class)->name('auth.profile');
    include 'modules/dashboard.php';
    include 'modules/user.php';
    include 'modules/billing.php';
    include 'modules/role.php';
    include 'modules/category.php';
});
