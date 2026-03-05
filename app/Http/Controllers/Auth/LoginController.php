<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Para debug

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validação
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Tentativa de login
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            // 🔍 LOG PARA DEBUG
            Log::info('Login realizado com sucesso para: ' . $request->email);
            
            // Redirecionamento (pode ser assim)
            return redirect()->intended('dashboard');
            
            // OU assim (teste ambos)
            // return redirect()->route('dashboard');
        }

        // 🔍 LOG PARA DEBUG
        Log::warning('Falha no login para: ' . $request->email);

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}