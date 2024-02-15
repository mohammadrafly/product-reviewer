<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Product $product, Review $review, User $user, )
    {
        $title = 'Dashboard';
        $data = [
            'product' => $product->count(),
            'review' => $review->count(),
            'user' => $user->count(),
        ];
        return view('dashboard.index', compact('title', 'data'));
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
