@extends('layouts')

@section('content')
<div class="container mt-4">
    <h2>Edit Product</h2>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">← Back</a>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label>Category <span class="text-danger">*</span></label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Market Price (₹) <span class="text-danger">*</span></label>
            <input type="number" name="market_price" class="form-control" step="0.01" value="{{ $product->market_price }}" required>
        </div>
        <div class="mb-3">
            <label>Sale Price (₹) <span class="text-danger">*</span></label>
            <input type="number" name="sale_price" class="form-control" step="0.01" value="{{ $product->sale_price }}" required>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @if($product->image)
                <img src="{{ asset($product->image) }}" width="80" class="mt-2" alt="Product Image">
            @endif
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Current Stock <span class="text-danger">*</span></label>
            <input type="number" name="current_stock" class="form-control" readonly value="{{ $product->current_stock }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Product</button>
    </form>
</div>
@endsection
