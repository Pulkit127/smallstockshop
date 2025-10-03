@extends('layouts')

@section('content')

    <!-- Hero Section -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Welcome to Small Stock Shop</h1>
            <p class="lead">Manage products, stock, and reports easily.</p>
            <a href="{{ Route('index') }}" class="btn btn-light btn-lg mt-3">Get Started</a>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Products</h5>
                            <p class="card-text">Add and manage your product categories, prices, and images.</p>
                            <a href="{{ Route('products.index') }}" class="btn btn-primary">View Products</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-4 mt-md-0">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Stock</h5>
                            <p class="card-text">Track stock availability and keep everything updated in real-time.</p>
                            <a href="#" class="btn btn-primary">Manage Stock</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-4 mt-md-0">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Reports</h5>
                            <p class="card-text">Generate sales and purchase reports for better decision-making.</p>
                            <a href="#" class="btn btn-primary">View Reports</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection