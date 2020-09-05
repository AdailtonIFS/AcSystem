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
        $userid = User::where('registration', $request->registration)->first();

        if($userid->category_id == 0 || $userid->category_id == 1){
            if(Auth::attempt($credentials)){
                return response()->json(['message'=>'sucess']);
            }else{
                return response()->json(['message' => 'Credenciais inválidas']);
            }
        }else{
            return response()->json(['message' => 'Erro no sistema']);
        }
    }
    public function Logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
