@extends('layouts')

@section('content')
<div class="container mt-4">
    <h2>Purchase Report</h2>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Invoice No</th>
                <th>Supplier</th>
                <th>Date</th>
                <th>Total Amount (₹)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($purchases as $key => $purchase)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $purchase->invoice_no }}</td>
                    <td>{{ $purchase->supplier->name ?? '-' }}</td>
                    <td>{{ $purchase->date }}</td>
                    <td>₹{{ number_format($purchase->total_amount,2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No purchases found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
