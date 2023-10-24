<?php

use Illuminate\Support\Facades\Route;
use Modules\Leads\Http\Controllers\LeadsController;

Route::group(['prefix' => 'account/leads'], function(){
    Route::resource('leads', LeadsController::class)->names('account.leads');
});