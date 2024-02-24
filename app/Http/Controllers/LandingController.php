<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Str;

class LandingController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'product' => Product::all(),
            'review' => Review::with('product')->get(),
        ];
        return view('landingpage.index',compact('data'));
    }

    public function singleProduct(Request $request, $id)
    {
        $data = [
            'title' => 'Product',
            'product' => Product::find($id),
            'review' => Review::where('id_product', $id)->get(),
            'countReview' => Review::where('id_product', $id)->count()
        ];
        return view('landingpage.productSingle',compact('data'));
    }

    public function review(Request $request, $id)
    {
        if ($request->ajax()) {
            Review::create([
                'id_product' => $id,
                'name' => $request->name,
                'email' => $request->email,
                'stars' => $request->stars,
                'review' => $request->review,
            ]);

            return $this->jsonResponse(true, 'Berhasil Menambah Review.');
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
