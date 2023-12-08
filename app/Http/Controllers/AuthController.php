<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest  $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard'); // Ruta para administradores
            } else {
                return redirect()->route('client.dashboard'); // Ruta para clientes
            }
        }
        return back()->withErrors(['email' => 'Las credenciales proporcionadas son incorrectas.']);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(UserRequest $request)
    {
        $userData = $request->validated();
        $userData['password'] = Hash::make($userData['password']);
        $userData['role'] = 'cliente';
        User::create($userData);
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
