@extends('layouts')

@section('title', 'Product Details')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="width: 50%; max-width: 600px;">
        <h3 class="card-title text-center mb-4">Product Details</h3>

        {{-- Product Image --}}
        @if($product->image)
            <div class="text-center mb-3">
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid img-thumbnail" style="max-height:200px;">
            </div>
        @endif

        {{-- Product Details Table --}}
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th>Name:</th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <th>Category:</th>
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Market Price:</th>
                    <td>{{ number_format($product->market_price, 2) }}</td>
                </tr>
                <tr>
                    <th>Sale Price:</th>
                    <td>{{ number_format($product->sale_price, 2) }}</td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>{{ $product->description ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Created At:</th>
                    <td>{{ $product->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Updated At:</th>
                    <td>{{ $product->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
            </tbody>
        </table>

        {{-- Buttons --}}
        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
