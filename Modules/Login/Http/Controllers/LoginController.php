<?php

namespace Modules\Login\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Colaborators\Entities\Colaborator;
use Modules\Login\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('login::index');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->safe()->only(['email', 'password']);

        $colaboratorArrayOfOneItem = Colaborator::where('email', $credentials['email'])->limit(1)->get(['id']);
        
        if($colaboratorArrayOfOneItem->count() > 0){

            foreach($colaboratorArrayOfOneItem as $colaborator){
                if($colaborator->user->isActive()){
                    if(Auth::attempt(['username' => $colaborator->user->username, 'password' => $credentials['password']])){
                        $request->session()->regenerate();
                        return redirect()->route('account.home');
                    }{
                        return redirect()->route('auth.sign-in')->withErrors('Senha incorrecta');
                    }
                }else{
                    return redirect()->route('auth.sign-in')->withErrors('Conta desactivada, contacte o seu supervisor');
                }
            }
        }else{
            return redirect()->route('auth.sign-in')->withErrors('Email não encontrado');
        }
    }

}
