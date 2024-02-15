<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function index(Request $request, User $user)
    {
        if ($request->ajax()) {
            $user = User::find(Auth::user()->id);
            $user->update($request->only(['name', 'email']));

            return $this->jsonResponse(true, 'Berhasil Update Profile');
        }
        $data = [
            'userdata' => $user->find(Auth::user()->id),
        ];
        $title = 'Setting Profile';
        return view('dashboard.profile', compact('title', 'data'));
    }

    function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string',
            'new_password_confirm' => 'required|string|same:new_password',
        ]);

        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->old_password, $user->password)) {
            return $this->jsonResponse(false, 'Password lama tidak cocok.', 400);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return $this->jsonResponse(true, 'Password berhasil diubah.');
    }


    private function jsonResponse($success, $message, $statusCode = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message
        ], $statusCode);
    }
}
