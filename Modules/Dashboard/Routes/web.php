<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\DashboardController;

Route::group(['prefix' => 'account'], function(){
    Route::get('/home', [ DashboardController::class, 'index' ])->name('account.home');
});
