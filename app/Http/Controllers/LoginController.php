<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('Permission.login', [
            'title' => 'login'
        ]);
    }

    public function authenticate(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $requested = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($requested)) {
            $request->session()->regenerate();
            // return redirect()->intended('/home');
            if(Auth::user()->role === 'user'){
                return redirect()->intended('/my-account');
            } else{
                return redirect()->intended('/admin');
            }
        } else {
            return redirect('login');
        }
    }
    public function logout() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
