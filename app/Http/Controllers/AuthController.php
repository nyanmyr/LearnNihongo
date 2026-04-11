<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Handle Registration
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        // Create the student account with starting XP
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), // Always hash passwords!
            'xp' => 0,
            'streak_days' => 0,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    // Handle Login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    // Handle Logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
