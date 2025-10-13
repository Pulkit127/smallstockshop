<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Exports\PurchaseExport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    // Purchase report
    public function purchases()
    {
        $purchases = Purchase::with('items.product')->where('user_id',Auth::id())->latest()->get();
        return view('reports.purchases', compact('purchases'));
    }

    // Stock report
    public function stock()
    {
        $products = Product::where('user_id',Auth::id())->paginate(10);
        return view('reports.stock', compact('products'));
    }

    // Profit / Loss report
    public function profitLoss()
    {
        $sales = Sale::with('items')->where('user_id', Auth::id())->get();
        $purchases = Purchase::with('items')->where('user_id', Auth::id())->get();

        $totalSales = $sales->sum('total_amount');
        $totalPurchase = $purchases->sum(function ($purchase) {
            return $purchase->items->sum('total');
        });

        $profitLoss = $totalSales - $totalPurchase;

        return view('reports.profit-loss', compact('totalSales', 'totalPurchase', 'profitLoss'));
    }

    public function purchasePdf()
    {
        $purchases = Purchase::with('supplier', 'items')->where('user_id', Auth::id())->latest()->get();
        $pdf = PDF::loadView('reports.purchases_pdf', compact('purchases'));
        return $pdf->download('purchase_report.pdf');
    }
}
