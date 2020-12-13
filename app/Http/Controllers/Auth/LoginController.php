<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(LoginRequest $request)
    {
        $credentials = [
            'registration' => $request->registration,
            'password' => $request->password,
            'status' => 1,
        ];

        if (Auth::attempt($credentials)) {
            if (\auth()->user()->status){
                return redirect('home');
            }else{
                return view('formLogin')->with('message', 'Você não é um usuário ativo no sistema. Para sanar as dúvidas procure sua coordenação.');
            }
        } else {
            return view('formLogin')->with('message', 'Login ou senha incorretos');
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
