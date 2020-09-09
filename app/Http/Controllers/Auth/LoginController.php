<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(LoginRequest $request){
        $credentials = [
            'registration'=> $request->registration,
            'password'=> $request->password,
        ];
        
                if(Auth::attempt($credentials)){
                    return response()->json(['message'=>'sucess']);
                }else{
                    return response()->json(['message' => 'Credenciais inválidas']);
                }            
        }

    public function Logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
