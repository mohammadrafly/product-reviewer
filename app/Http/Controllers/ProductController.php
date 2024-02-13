<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $this->validateProductRequest($request);

            $product_picture = $this->handleFileUpload($request);

            Product::create([
                'product_name' => $request->product_name,
                'product_desc' => $request->product_desc,
                'product_picture' => $product_picture,
                'published' => $request->published
            ]);

            return $this->jsonResponse(true, 'Berhasil Menambah Product.');
        }

        $data = Product::all();
        $title = 'Data Product';
        return view('dashboard.product', compact('title', 'data'));
    }

    public function update(Request $request, Product $product, $id)
    {
        if ($request->ajax()) {
            if (!$product->find($id)) {
                return $this->jsonResponse(false, 'Product not found.', 404);
            }
    
            if ($request->isMethod('get')) {
                return $this->jsonResponse(true, $product->find($id), 200);
            }
    
            $this->validateProductRequest($request);
    
            $product = Product::find($id);
            $product->update($request->only(['product_name', 'product_desc', 'published']));
    
            $product_picture = $this->handleFileUpload($request);
            if ($product_picture) {
                $product->product_picture = $product_picture;
                $product->save();
            }
    
            return $this->jsonResponse(true, 'Berhasil Memperbarui Product.');
        }
    }
    

    public function delete(Request $request, Product $product, $id)
    {
        if ($request->ajax()) {
            if (!$product) {
                return $this->jsonResponse(false, 'Product not found.', 404);
            }

            $product = Product::find($id);
            $product->delete();

            return $this->jsonResponse(true, 'Berhasil Menghapus Product.');
        }
    }

    private function validateProductRequest(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'product_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image uploads
            'published' => 'required',
        ]);
    }

    private function handleFileUpload(Request $request)
    {
        if ($request->hasFile('product_picture')) {
            $profilePhoto = $request->file('product_picture');
            $fileName = time() . '.' . $profilePhoto->getClientOriginalExtension();
            $profilePhoto->move(public_path('product_pictures'), $fileName);
            return $fileName;
        }
        return null;
    }

    private function jsonResponse($success, $message, $statusCode = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message
        ], $statusCode);
    }
}