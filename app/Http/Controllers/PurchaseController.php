<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Product;
use App\Models\Supplier;

class PurchaseController extends Controller
{
    // Show all purchases
    public function index(Request $request)
    {
        // Step 1: Get search input
        $search = $request->input('item');

        // Step 2: Query with optional search filter
        $purchases = Purchase::with('supplier')
            ->when($search, function ($query, $search) {
                $query->where('invoice_no', 'like', "%{$search}%") // Purchase invoice number
                    ->orWhereHas('supplier', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%"); // Supplier name
                    });
            })
            ->latest()
            ->paginate(10);

        // Step 3: Pass data and search term to view
        return view('purchases.index', compact('purchases', 'search'));
    }

    // Show create form
    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('purchases.create', compact('suppliers', 'products'));
    }

    // Store purchase
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'date' => 'required|date',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $purchase = Purchase::create([
            'supplier_id' => $request->supplier_id,
            'invoice_no' => $request->invoice_no,
            'date' => $request->date,
            'total_amount' => 0,
        ]);

        $total = 0;

        foreach ($request->items as $item) {
            $lineTotal = $item['quantity'] * $item['price'];

            PurchaseItem::create([
                'purchase_id' => $purchase->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => $lineTotal,
            ]);

            // Stock update logic
            $product = Product::find($item['product_id']);
            $product->current_stock += $item['quantity'];
            $product->save();

            $total += $lineTotal;
        }

        $purchase->update(['total_amount' => $total]);

        return redirect()->route('purchases.index')->with('success', 'Purchase added successfully!');
    }
}
