@extends('layouts')

@section('content')
<div class="container mt-4">
    <h2>Profit / Loss Report</h2>

    <table class="table table-bordered mt-3">
        <tr>
            <th>Total Sales</th>
            <td>₹{{ number_format($totalSales,2) }}</td>
        </tr>
        <tr>
            <th>Total Purchases</th>
            <td>₹{{ number_format($totalPurchase,2) }}</td>
        </tr>
        <tr>
            <th>Profit / Loss</th>
            <td style="color: {{ $profitLoss >= 0 ? 'green' : 'red' }};">
                ₹{{ number_format($profitLoss,2) }}
            </td>
        </tr>
    </table>
</div>
@endsection
