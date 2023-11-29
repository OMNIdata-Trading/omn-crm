<?php

use Illuminate\Support\Facades\Route;
use Modules\Colaborators\Http\Controllers\ColaboratorsController;

Route::group(['prefix' => 'account/colaborators', 'middleware' => 'auth'], function(){
    Route::resource('colaborators', ColaboratorsController::class)->names('account.colaborators');
    Route::get('/settings', [ ColaboratorsController::class, 'settings' ])->name('account.colaborators.settings');
});