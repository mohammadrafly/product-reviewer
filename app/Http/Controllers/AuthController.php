<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) {
            $title = 'Login';
            return view('auth.login', compact('title'));
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password',
                'errors' => $validator->errors()->toArray()
            ]);
        }

        $authenticated = Auth::attempt($request->only('email', 'password'));

        return response()->json([
            'success' => $authenticated,
            'message' => $authenticated ? 'Login successful' : 'Invalid credentials',
            'redirect' => $authenticated ? route('dashboard') : null,
        ]);
    }
}
