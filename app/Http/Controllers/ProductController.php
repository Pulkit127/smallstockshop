<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
    }

    public function create() {
        return view("products.create");
    }

    public function store(Request $request) {
        $product = Product::create($request->all());
    }

    public function show() {
        return view('products.show');
    }
}
