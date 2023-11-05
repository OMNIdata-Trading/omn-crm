<?php

use Illuminate\Support\Facades\Route;
use Modules\Leads\Http\Controllers\DropdownDependencyController;
use Modules\Leads\Http\Controllers\LeadsController;

Route::group(['prefix' => 'account/leads', 'middleware' => 'auth'], function(){
    Route::resource('leads', LeadsController::class)->names('account.leads');
});

// Route::group(['prefix' => 'fetching/dropdowns', 'middleware' => 'auth'], function(){
//     Route::post('client-companies/colaborators', [ DropdownDependencyController::class, 'fetchColaboratorsFromClientCompanyWithId' ])->name('fetching.dropdowns.companies_colaborators');
// });