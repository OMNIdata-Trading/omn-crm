<?php

namespace App\Http\Controllers\modules\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('modules.auth.pages.sign-in');
    }
}
