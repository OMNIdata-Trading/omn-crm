<?php

use Illuminate\Support\Facades\Route;
use Modules\Requests\Http\Controllers\RequestsController;

Route::group(['prefix' => 'account/business/requests', 'middleware' => 'auth'], function(){
    Route::resource('requests', RequestsController::class)->names('account.business.requests');
});