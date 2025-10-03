<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view("products.create", compact("categories"));
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        // Handle file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('products', 'public');
            $validated['image'] = $path;
        }

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Product created successfully!');

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));

    }

    public function update(ProductRequest $request, Product $product)
    {

        $data = $request->validated();

        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($product->image && \Storage::disk('public')->exists($product->image)) {
                \Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.show', compact('product', 'categories'));
    }
    public function destroy(Product $product)
    {
        $product->delete(); // soft delete
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
