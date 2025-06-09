<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     public function showRegister(){
        return view('register');
    }

    public function showLogIn(){
        return view('login');
    }

    public function register(Request $request){
        $validated = $request->validate([
        'name' => ['required', 'string', 'min:3', 'max:50'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8', 'max:64', 'confirmed'], 
    ]);

        $validated['password'] = Hash::make($validated['password']); 

        $user = User::create($validated);
        Auth::login($user);

        return redirect('/');
    }

    public function logout(){
       Auth::logout();
        return redirect('/');
        
    }

    public function login(Request $request){
         $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'This email is not registered.',
            ])->onlyInput('email');
        }

        if (!Auth::guard('web')->attempt($credentials)) {
            return back()->withErrors([
                'password' => 'Incorrect password.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended('/');
        }
}
