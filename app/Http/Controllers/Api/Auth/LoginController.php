<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
 
        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login successful'], 200);
        }
 
        throw ValidationException::withMessages([
            'email' => ['パスワードが間違っています。'],
        ]);
    }
 
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logged out'], 200);
    }
}
