<?php

use Illuminate\Support\Facades\Route;
use Modules\Goals\Http\Controllers\GoalsController;

Route::group(['prefix' => 'account/overview', 'middleware' => 'auth'], function(){
    Route::resource('/goals', GoalsController::class)->names('account.overview.goals');
});