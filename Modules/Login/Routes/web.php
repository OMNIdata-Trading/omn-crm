<?php

use Illuminate\Support\Facades\Route;
use Modules\Login\Http\Controllers\LoginController;

Route::group(['prefix' => 'auth'], function(){
    Route::get('/sign-in', [ LoginController::class, 'index' ])->name('auth.sign-in');
});
