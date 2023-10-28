<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function auth(Request $request)
    {
        
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->except(['_token']);

        if (auth()->attempt($credentials)) {
            return redirect()->route('client.index');
        }

        return redirect()->back()->with('message','Login ou mot de passe incorrect');
    }

    public function logout()
    {
       
        Session::flush();
        
        Auth::logout();

        return redirect('/');
    }
}
