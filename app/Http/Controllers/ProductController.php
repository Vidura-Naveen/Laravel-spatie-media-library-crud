<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display a list of created products along with their images
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    // Display the form to create a new product
    public function create()
    {
        return view('products.create');
    }

    // Store a new product along with its uploaded image file
    public function store(Request $request)
{
    $validatedData = $request->validate([
        // Sets a max image upload file size of 2048 kilobytes or 2MB, adjust as needed:
        'image' => 'required|image|max:2048',
        // Validate that other fields contain proper values too:
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
        'price' => 'required|numeric|min:0|max:999999',
    ]);

    // First create the product in the database using the Eloquent model
    $product = Product::create($validatedData);

    // Then associate the uploaded image file with the product
    $product->addMediaFromRequest('image')->toMediaCollection('product-images');

    // Send the user back to the product list page
    return redirect(route('products.index'))->with('success', 'Product created successfully.');
}


}
