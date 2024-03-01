<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Product $product, Review $review, User $user)
    {
        $title = 'Dashboard';
        $data = [
            'product' => $product->count(),
            'review' => $review->count(),
            'user' => $user->count(),
        ];

        return view('dashboard.index', compact('title', 'data'));
    }

    public function logout()
    {
        Auth::logout();

        return response()->json([
            'message' => 'Logout successful',
            'redirect' => route('login'),
        ], 200);
    }
}
