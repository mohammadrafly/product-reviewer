<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $this->validateReviewRequest($request);

            Review::create([
                'id_product' => $request->id_product,
                'name' => $request->name,
                'email' => $request->email,
                'stars' => $request->stars,
                'review' => $request->review,
            ]);

            return $this->jsonResponse(true, 'Berhasil Menambah Review.');
        }

        $data = [
            'dataReview' => Review::all(),
            'dataProduct' => Product::all()
        ];
        $title = 'Data Review';
        return view('dashboard.review', compact('title', 'data'));
    }

    public function update(Request $request, Review $review, $id)
    {
        if ($request->ajax()) {
            if (!$review->find($id)) {
                return $this->jsonResponse(false, 'Review not found.', 404);
            }
    
            if ($request->isMethod('get')) {
                return $this->jsonResponse(true, $review->find($id), 200);
            }
    
            $this->validateReviewRequest($request);
    
            $review = Review::find($id);
            $review->update($request->only(['id_product', 'name', 'email', 'stars', 'review']));
    
            return $this->jsonResponse(true, 'Berhasil Memperbarui Review.');
        }
    }
    

    public function delete(Request $request, Review $review, $id)
    {
        if ($request->ajax()) {
            if (!$review) {
                return $this->jsonResponse(false, 'Review not found.', 404);
            }

            $review = Review::find($id);
            $review->delete();

            return $this->jsonResponse(true, 'Berhasil Menghapus Review.');
        }
    }

    private function validateReviewRequest(Request $request)
    {
        $request->validate([
            'id_product' => 'required',
            'name' => 'required',
            'email' => 'required',
            'stars' => 'required',
            'review' => 'required',
        ]);
    }

    private function jsonResponse($success, $message, $statusCode = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message
        ], $statusCode);
    }
}
