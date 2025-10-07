@extends('layouts')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h2>Purchases List</h2>
            <a href="{{ route('purchases.create') }}" class="btn btn-primary">+ Add Purchase</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Supplier</th>
                    <th>Invoice No</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($purchases as $key => $purchase)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $purchase->supplier->name ?? 'N/A' }}</td>
                        <td>{{ $purchase->invoice_no ?? '-' }}</td>
                        <td>{{ $purchase->date }}</td>
                        <td>₹{{ number_format($purchase->total_amount, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No purchases found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="mt-3">
            {{ $purchases->links() }}
        </div>
    </div>
@endsection