<!DOCTYPE html>
<html>
<head>
    <title>Purchase Report</title>
    <style>
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #000; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Purchase Report</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Invoice</th>
                <th>Supplier</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchases as $key => $purchase)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $purchase->invoice_no }}</td>
                <td>{{ $purchase->supplier->name ?? '-' }}</td>
                <td>₹{{ number_format($purchase->total,2) }}</td>
                <td>{{ $purchase->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
