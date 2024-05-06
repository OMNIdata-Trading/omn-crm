<?php

use Illuminate\Support\Facades\Route;
use Modules\Colaborators\Http\Controllers\ColaboratorRoleClassificationController;
use Modules\Colaborators\Http\Controllers\ColaboratorRoleController;
use Modules\Colaborators\Http\Controllers\ColaboratorsController;

Route::group(['prefix' => 'account/colaborators', 'middleware' => 'auth'], function(){
    Route::resource('colaborators', ColaboratorsController::class)->names('account.colaborators');
    
    Route::get('settings', [ ColaboratorsController::class, 'settings' ])->name('account.colaborators.settings');
    Route::resource('settings/classification', ColaboratorRoleClassificationController::class)->names('account.colaborators.classifications');
    Route::resource('settings/role', ColaboratorRoleController::class)->names('account.colaborators.roles');
});