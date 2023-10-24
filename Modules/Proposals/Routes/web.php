<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'account/business/proposals'], function() {
    Route::resource('proposals', ProposalsController::class)->names('account.business.proposals');
});