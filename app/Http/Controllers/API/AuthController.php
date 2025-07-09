<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\API\BaseController;
use Illuminate\Support\Facades\Log;

class AuthController extends BaseController
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $this->sendResponse([
            'token' => $user->createToken('API Token')->plainTextToken,
        ], 'User registered successfully.');
    }

    public function login(Request $request)
    {
        Log::info('Login attempt', [
            'email' => $request->email,
            'time' => now()
        ]);

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->sendError('Invalid credentials.', [], 401);
        }

        $user = Auth::user();
        Log::info('Login succesfully', [
            'email' => $request->email,
            'time' => now()
        ]);
        return $this->sendResponse([
            'token' => $user->createToken('API Token')->plainTextToken,
        ], 'User logged in successfully.');
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return $this->sendResponse([], 'User logged out successfully.');
    }
}
