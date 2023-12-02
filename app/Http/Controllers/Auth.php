<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Auth extends Controller
{
    public function getLogin()
    {
        return view('login');
    }
    
    // public function postLogin(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     if (auth()->attempt($credentials)) {
    //         return redirect()->intended('dashboard');
    //     }
    //     return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    // }
}
