<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;




class UserController extends Controller
{
    //
    public function showlogin(){
        return view('login');
    }

    public function verificalogin(Request $request){
        $credentials =$request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ],[
            'email.required'=>'Ingrese el usuario',
            'password'=>'Ingrese la contraseña'
        ]);
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect()->intended('bienvenido')->with('status','Sesión correcta');
            }
            throw ValidationException::withMessages([
                'email'=>'Usuario no encontrado',
                'password'=>'Contraseña incorrecta'
            ]);
    }
    public function salir(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
