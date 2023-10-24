<?php

namespace App\Http\Controllers\modules\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('modules.account.pages.home.index');
    }
}
