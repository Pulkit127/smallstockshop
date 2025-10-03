<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Small Shop Retail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">SmallStockShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{ Route('index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ Route('products.index') }}">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Stock</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ Route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <!-- <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">&copy; 2025 SmallStockShop. All rights reserved.</p>
    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>