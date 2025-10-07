<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Product;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::latest()->paginate(10);
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'nullable|string|max:255',
            'date' => 'required|date',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $sale = Sale::create([
            'customer_name' => $request->customer_name,
            'date' => $request->date,
            'total_amount' => 0,
        ]);

        $total = 0;

        foreach ($request->items as $item) {
            $lineTotal = $item['quantity'] * $item['price'];

            SaleItem::create([
                'sale_id' => $sale->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => $lineTotal,
            ]);

            // Reduce stock
            $product = Product::find($item['product_id']);
            $product->current_stock -= $item['quantity'];
            $product->save();

            $total += $lineTotal;
        }

        $sale->update(['total_amount' => $total]);

        return redirect()->route('sales.index')->with('success', 'Sale recorded successfully!');
    }
}
