@extends('layouts')

@section('content')
    <div class="container mt-4">
        <h2>Stock Levels</h2>

        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Selling Price (₹)</th>
                    <th>Current Stock</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $minStock = 0; 
                @endphp

                @forelse ($products as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>₹{{ number_format($product->sale_price, 2) }}</td>
                        <td @if($product->current_stock < $minStock) style="background-color:red;font-weight:bold;" @endif>
                            {{ $product->current_stock }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="mt-3">
            {{ $products->links() }}
        </div>
    </div>
@endsection