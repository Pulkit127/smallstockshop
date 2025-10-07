@extends('layouts')

@section('content')
<div class="container mt-4">
    <h2>Add Product</h2>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">← Back</a>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Category <span class="text-danger">*</span></label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Market Price (₹) <span class="text-danger">*</span></label>
            <input type="number" name="market_price" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label>Sale Price (₹) <span class="text-danger">*</span></label>
            <input type="number" name="sale_price" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Current Stock <span class="text-danger">*</span></label>
            <input type="number" name="current_stock" class="form-control" min="0" required>
        </div>
        <button type="submit" class="btn btn-success">Save Product</button>
    </form>
</div>
@endsection
