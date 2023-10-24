<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

if(!Auth::User()){
    Route::redirect('/', 'auth/sign-in');
}else{
    Route::redirect('/', 'account/home');
}