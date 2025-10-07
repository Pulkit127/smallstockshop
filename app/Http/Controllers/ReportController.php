<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Product;
use PDF;

use App\Exports\PurchaseExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    // Purchase report
    public function purchases()
    {
        $purchases = Purchase::with('items.product')->latest()->get();
        return view('reports.purchases', compact('purchases'));
    }

    // Stock report
    public function stock()
    {
        $products = Product::paginate(10);
        return view('reports.stock', compact('products'));
    }

    // Profit / Loss report
    public function profitLoss()
    {
        $sales = Sale::with('items')->get();
        $purchases = Purchase::with('items')->get();

        $totalSales = $sales->sum('total_amount');
        $totalPurchase = $purchases->sum(function ($purchase) {
            return $purchase->items->sum('total');
        });

        $profitLoss = $totalSales - $totalPurchase;

        return view('reports.profit-loss', compact('totalSales', 'totalPurchase', 'profitLoss'));
    }

    public function purchasePdf()
    {
        $purchases = Purchase::with('supplier', 'items')->get();
        $pdf = PDF::loadView('reports.purchases_pdf', compact('purchases'));
        return $pdf->download('purchase_report.pdf');
    }

    public function purchaseExcel()
    {
        return Excel::download(new PurchaseExport, 'purchase_report.xlsx');
    }
}
