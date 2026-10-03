<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showRegister()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => '|in:admin, secretaire, formateur'

        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()
            ->route('home.index')
            ->with('success', 'Bienvenu' . $user->name . '!');
    }


    public function showLogin()
    {
        return view('auth.login');
    }



    public function login(Request $request)
    {
        $credentials = $request->validate([

            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home.index')->with('success', 'connexion réussir');
        }

        return back()->withInput()->with('error', 'Email ou mot de passe incorrect');
    }


    public function logout(Request $request)
    {
        // Déconnecter l'utilisateur
        Auth::logout();

        // Détruire la session
        $request->session()->invalidate();

        // Régénérer le token CSRF
        $request->session()->regenerateToken();

        // Retour à la page de connexion
        return redirect()->back();
    }
}
