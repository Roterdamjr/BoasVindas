<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(){  
        return view('auth.register' );
    }

    public function registerPost(Request $request){  
        $request->validate([
            "fullname"=>"required",
            "email"=>"required",
            "password"=>"required"
        ]);
        
        $user = new User;
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($user->save()){ 
            return redirect('/login')->with("msg","Registro criado com sucesso");
        } else{
            return redirect('/register')->with("msg","Erro");
        }        
    }

    public function login(){  
        return view('auth.login' );
    }

    public function loginPost(Request $request){  
        $request->validate([
            "email"=>"required",
            "password"=>"required"
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida
            return redirect()->intended('/');
        }
    
        // Autenticação falhou
        return redirect()->back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Desautentica o usuário

        // Invalida a sessão e gera um novo token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Redireciona para a tela de login
    }
}
