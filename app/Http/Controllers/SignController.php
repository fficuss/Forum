<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SignController extends Controller
{
    public function showsignin()
    {
        return view('signin');
    }

    public function showreg()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'usr' => 'required|string|max:255|unique:users,username',
            'psw' => 'required|string|min:8',
        ]);

        $user = User::create([
            'email' => $request->email,
            'username' => $request->usr,
            'password' => Hash::make($request->psw),
        ]);

        Auth::login($user);

        return redirect()->route('profile');
    }

    public function signin(Request $request)
    {
        $credentials = $request->only('email', 'psw');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['psw']])) {
            return redirect()->route('profile');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function signout(Request $request)
    {
        Auth::logout();
        return redirect()->route('signin');
    }
}
