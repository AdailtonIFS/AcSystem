<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        $request->validate([
            'registration' => 'required',
            'password' => 'required',
        ],[
            'registration.required' => 'Por favor preencha todos os campos e tente novamente.',
            'password.required' => 'Por favor preencha todos os campos e tente novamente.'
        ]);
        $credentials = [
            'registration' => $request->registration,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            if (\auth()->user()->status == 1){
                return redirect('home');
            }else{
                Auth::logout();
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
