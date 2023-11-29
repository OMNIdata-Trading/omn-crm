<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\UsersController;

Route::group([ 'prefix' => 'account', 'middleware' => 'auth' ], function(){
    Route::resource('users', UsersController::class)->names('account.users');
    Route::get('/users/settings', [ UsersController::class, 'settings' ])->name('account.users.settings');
});