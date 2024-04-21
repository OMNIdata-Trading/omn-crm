<?php

use Illuminate\Support\Facades\Route;
use Modules\Leads\Http\Controllers\BusinessLeadsController;
use Modules\Leads\Http\Controllers\IndividualLeadsController;

Route::group(['prefix' => 'account', 'middleware' => 'auth'], function(){
    Route::resource('/leads/businesses', BusinessLeadsController::class)->names('account.leads.businesses');
    Route::resource('/leads/individuals', IndividualLeadsController::class)->names('account.leads.individuals');
});