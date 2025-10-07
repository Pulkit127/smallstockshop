@extends('layouts')

@section('content')
<div class="container mt-4">
    <h2>Add Sale</h2>
    <a href="{{ route('sales.index') }}" class="btn btn-secondary mb-3">← Back</a>

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Customer Name</label>
            <input type="text" name="customer_name" class="form-control" placeholder="Enter customer name">
        </div>

        <div class="mb-3">
            <label>Date <span class="text-danger">*</span></label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <h5>Sale Items</h5>
        <table class="table table-bordered" id="items-table">
            <thead class="table-light">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price (₹)</th>
                    <th>Total (₹)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="items[0][product_id]" class="form-control" required>
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" name="items[0][quantity]" class="form-control qty" min="1" required></td>
                    <td><input type="number" name="items[0][price]" class="form-control price" step="0.01" required></td>
                    <td><input type="text" name="items[0][total]" class="form-control total" readonly></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button></td>
                </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-secondary" id="add-row">+ Add Row</button>

        <h4 class="text-end mt-3">
            Grand Total: ₹<span id="grand-total">0.00</span>
        </h4>

        <button type="submit" class="btn btn-success">Save Sale</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tableBody = document.querySelector('#items-table tbody');
    const grandTotalEl = document.getElementById('grand-total');

    function updateTotals() {
        let grandTotal = 0;
        tableBody.querySelectorAll('tr').forEach(row => {
            const qty = parseFloat(row.querySelector('.qty')?.value) || 0;
            const price = parseFloat(row.querySelector('.price')?.value) || 0;
            const total = qty * price;
            row.querySelector('.total').value = total.toFixed(2);
            grandTotal += total;
        });
        grandTotalEl.textContent = grandTotal.toFixed(2);
    }

    tableBody.addEventListener('input', function(e) {
        if (e.target.classList.contains('qty') || e.target.classList.contains('price')) {
            updateTotals();
        }
    });

    document.getElementById('add-row').addEventListener('click', function() {
        const index = tableBody.querySelectorAll('tr').length;
        const newRow = `
        <tr>
            <td>
                <select name="items[${index}][product_id]" class="form-control" required>
                    <option value="">Select Product</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="number" name="items[${index}][quantity]" class="form-control qty" min="1" required></td>
            <td><input type="number" name="items[${index}][price]" class="form-control price" step="0.01" required></td>
            <td><input type="text" name="items[${index}][total]" class="form-control total" readonly></td>
            <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button></td>
        </tr>`;
        tableBody.insertAdjacentHTML('beforeend', newRow);
    });

    tableBody.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
            updateTotals();
        }
    });
});
</script>
@endsection
