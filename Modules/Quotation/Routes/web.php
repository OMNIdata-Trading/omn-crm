<?php

use Illuminate\Support\Facades\Route;
use Modules\Quotation\Http\Controllers\QuotationController;

Route::group(['prefix' => 'account/business', 'middleware' => 'auth'], function(){
    Route::resource('quotations', QuotationController::class)->names('account.business.quotations');
});