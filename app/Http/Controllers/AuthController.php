<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($request->ajax()) {
            if (Auth::attempt($credentials)) {
                return response()->json([
                    'success' => true, 
                    'redirect' => 'dashboard'
                ]);
            } 

            return response()->json([
                'success' => false, 
                'message' => 'Invalid credentials'
            ]);
        }

        $title = 'Login';
        return view('auth.login', compact('title'));
    }
}
