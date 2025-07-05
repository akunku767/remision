<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('visitor.auth.login');
    }
    public function login()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($attributes)) {
            session()->regenerate();
            return redirect()->route('home.index')->with(['success' => 'Hai ' . Auth::user()->name . '! Selamat datang.']);
        } else {
            return redirect()->back()->with(['fail' => 'Email atau Password yang Anda masukkan salah!']);
        }
    }

    public function logout()
    {
        $name = Auth::user()->name;
        Auth::logout();

        return redirect()->back()->with(['success' => 'Hi ' . $name . '! You are logged out.']);
    }
}
