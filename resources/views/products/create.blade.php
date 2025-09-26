@extends('layouts')

@section('title', 'Add Product')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px;">
            <h3 class="card-title text-center mb-4">Add New Product</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ Route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                        placeholder="Enter product name" required>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" name="category_id" id="category_id" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="market_price" class="form-label">Market Price</label>
                    <input type="number" step="0.01" class="form-control" name="market_price" id="market_price"
                        value="{{ old('market_price') }}" placeholder="Enter market price" required>
                </div>

                <div class="mb-3">
                    <label for="sale_price" class="form-label">Selling Price</label>
                    <input type="number" step="0.01" class="form-control" name="sale_price" id="sale_price"
                        value="{{ old('sale_price') }}" placeholder="Enter sale price" required>
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="4"
                        placeholder="Enter product description">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Add Product</button>
                    <a href="{{ Route("products.index") }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection