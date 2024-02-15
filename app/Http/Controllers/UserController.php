<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $this->validateUserRequest($request);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            return $this->jsonResponse(true, 'Berhasil Menambah User.');
        }

        $data = User::all();
        $title = 'Data User';
        return view('dashboard.user', compact('title', 'data'));
    }

    public function update(Request $request, User $user, $id)
    {
        if ($request->ajax()) {
            if (!$user->find($id)) {
                return $this->jsonResponse(false, 'User not found.', 404);
            }
    
            if ($request->isMethod('get')) {
                return $this->jsonResponse(true, $user->find($id), 200);
            }
    
            $this->validateUserRequest($request, true);
    
            $user = User::find($id);
            $user->update($request->only(['name', 'email']));
    
            return $this->jsonResponse(true, 'Berhasil Memperbarui User.');
        }
    }
    

    public function delete(Request $request, User $user, $id)
    {
        if ($request->ajax()) {
            if (!$user) {
                return $this->jsonResponse(false, 'User not found.', 404);
            }

            $user = User::find($id);
            $user->delete();

            return $this->jsonResponse(true, 'Berhasil Menghapus User.');
        }
    }

    private function validateUserRequest(Request $request, $updating = false)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        if (!$updating) {
            $rules['password'] = 'required';
        }
    }

    private function jsonResponse($success, $message, $statusCode = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message
        ], $statusCode);
    }
}
