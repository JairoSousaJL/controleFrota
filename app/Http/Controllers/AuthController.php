<?php

namespace App\Http\Controllers;

use App\Administrador;
use App\Http\Requests\StoreAuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authenticate(StoreAuthRequest $request){
        $credentials = $request->only('user', 'password');

        //statusAdministrador = 1 (Administrador Ativo)
        $administrador = DB::table('administradors')
        ->where('user', '=', $request->user)
        ->where('statusAdministrador', '=', 1)
        ->first();

        if ($administrador) {
            if (Auth::attempt($credentials)) {
                return redirect()->intended('/painel');
            }else{
                $msg = "Acesso Negado!";
                return redirect()->back()->withErrors( $msg )->withInput();
            }
        }else{
            $msg = "Acesso Negado!";
            return redirect()->back()->withErrors( $msg )->withInput();
        }
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
