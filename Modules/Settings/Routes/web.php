<?php

use App\Http\Controllers\modules\account\UserController;
use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\SettingsController;

Route::group(['prefix' => 'account', 'middleware' => 'auth'], function(){
    Route::resource('settings', SettingsController::class)->names('account.settings');
    Route::get('/settings/profile', [ UserController::class,  'index' ])->name('account.settings.profile');
});