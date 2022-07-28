<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
 
        if (Auth::attempt($credentials)) {
            $userOrigin = Auth::user();
            $user = array(
                'id'=> $userOrigin->id,
                'name'=> $userOrigin->name,
                'email'=> $userOrigin->email,
                'role'=> $userOrigin->role,
                'token'=> $userOrigin->createToken('authToken')->plainTextToken
            );


            Session::put('logininfo',$user);
            return response()->json(['message' => 'Login successful', 'auth' => Auth::user()], 200);
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

    public function auth()
    {
        dd(Auth::user());
        $user = Auth::user();
        return response()->json($user, 200);
    }
}
