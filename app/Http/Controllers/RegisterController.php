<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('Permission.register', [
            'title' => 'Register'
        ]);
    }
    
    public function store(Request $request) {
        $validate = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required:min:5'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);
        
        return redirect()->route('login');
    }
}
