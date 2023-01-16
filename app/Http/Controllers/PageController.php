<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        return view('guest.dashboard');
    }

    public function login()
    {
        return view('guest.login');
    }

    public function register()
    {
        return view('guest.register');
    }

    public function landing()
    {
        return view('admin.landing');
    }

    public function registerstore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'address' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'address' => $request->address,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => 'User'
        ]);

        return redirect('/login');
    }

    public function loginstore(Request $request)
    {
        $login = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($login)) {
            if(Auth::user()->roles == 'Admin'){
                $request->session()->regenerate();
                return redirect()->intended('admin');
            }
            else{
                $request->session()->regenerate();
                return redirect()->intended('login');
            }
        }
    }

    public function logout(Request $request)
    {
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect('/');
    }
}
