@extends('layouts')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h2>Sales List</h2>
            <a href="{{ route('sales.create') }}" class="btn btn-primary">+ Add Sale</a>
        </div>

        <form method="GET" action="{{ route('sales.index') }}" class="row g-2 mb-3">
            <div class="col-md-4">
                <input type="text" name="item" value="{{ $search }}" class="form-control" placeholder="Search sale">
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    Search
                </button>
            </div>

            <div class="col-md-2">
                <a href="{{ route('sales.index') }}" class="btn btn-secondary w-100">
                    Reset
                </a>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sales as $key => $sale)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $sale->customer_name ?? '-' }}</td>
                        <td>{{ $sale->date }}</td>
                        <td>₹{{ number_format($sale->total_amount, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No sales found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="mt-3">
            {{ $sales->links() }}
        </div>
    </div>
@endsection