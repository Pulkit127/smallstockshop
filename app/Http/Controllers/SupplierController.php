<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Auth;
class SupplierController extends Controller
{
    // List all suppliers
    public function index(Request $request)
    {
        // Step 1: Get search input
        $search = $request->input('item');

        // Step 2: Apply search filter (if provided)
        $suppliers = Supplier::where('user_id', Auth::id())->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('address', 'like', "%{$search}%")
                ->orWhere('contact', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(10);

        // Step 3: Send data to view with search value
        return view('suppliers.index', compact('suppliers', 'search'));
    }


    // Show create form
    public function create()
    {
        return view('suppliers.create');
    }

    // Store new supplier
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ]);

        $request->merge(['user_id' => Auth::id()]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier added successfully.');
    }

    // Show edit form
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    // Update supplier
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    // Delete supplier
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}
