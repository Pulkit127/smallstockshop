@extends('layouts')

@section('content')
    <div class="container mt-4">

        <h2>Add Purchase</h2>
        <a href="{{ route('purchases.index') }}" class="btn btn-secondary mb-3">← Back</a>

        <form action="{{ route('purchases.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Supplier <span class="text-danger">*</span></label>
                <select name="supplier_id" class="form-control" required>
                    <option value="">Select Supplier</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Invoice No</label>
                <input type="text" name="invoice_no" class="form-control" placeholder="Enter invoice number">
            </div>

            <div class="mb-3">
                <label>Date <span class="text-danger">*</span></label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <h5 class="mt-4">Purchase Items</h5>
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
                        <td><input type="number" name="items[0][price]" class="form-control price" step="0.01" required>
                        </td>
                        <td><input type="text" class="form-control total" readonly></td>
                        <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button></td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-secondary" id="add-row">+ Add Row</button>

            <h4 class="text-end mt-3">
                Grand Total: ₹<span id="grand-total">0.00</span>
            </h4>

            <br><br>
            <button type="submit" class="btn btn-success">Save Purchase</button>
        </form>
    </div>

    <script>
        document.getElementById('add-row').addEventListener('click', function () {
            const tableBody = document.querySelector('#items-table tbody');
            const index = tableBody.rows.length;
            const row = `
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
                                                                                                                                                                                                                                                                                                                                <td><input type="text" class="form-control total" readonly></td>
                                                                                                                                                                                                                                                                                                                                <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button></td>
                                                                                                                                                                                                                                                                                                                            </tr>`;
            tableBody.insertAdjacentHTML('beforeend', row);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-row')) {
                e.target.closest('tr').remove();
            }
        });

        document.addEventListener('input', function (e) {
            // Check if input is qty or price
            if (e.target.classList.contains('qty') || e.target.classList.contains('price')) {

                const row = e.target.closest('tr');
                const qty = parseFloat(row.querySelector('.qty').value) || 0;
                const price = parseFloat(row.querySelector('.price').value) || 0;
                const total = qty * price;
                row.querySelector('.total').value = total.toFixed(2);

                // 🔁 Recalculate grand total every time something changes
                let grandTotal = 0;
                document.querySelectorAll('.total').forEach(input => {
                    grandTotal += parseFloat(input.value) || 0;
                });

                // Update the grand total display
                const grandTotalEl = document.getElementById('grand-total');
                if (grandTotalEl) {
                    grandTotalEl.textContent = grandTotal.toFixed(2);
                }
            }
        });

    </script>
@endsection