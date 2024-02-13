<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $product = Product::count();
        $review = Review::count();
        $user = User::count();
        return view('dashboard.index', compact('title', 'product', 'review', 'user'));
    }

    public function Logout(Request $request)
    {
        Auth::logout();

        if ($request->ajax()) {
            return response()->json([
                'message' => 'Logout successful',
                'redirect' => '/'
            ], 200);
        }
    }

}
