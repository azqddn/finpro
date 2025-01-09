<?php

namespace App\Http\Controllers;

use App\Models\Record;
// use Barryvdh\DomPDF\PDF;
use App\Models\Report;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    //Display report list
    public function displayReport()
    {
        $reportQuery = Report::with('user')->orderBy('created_at', 'desc');

        $report = $reportQuery->paginate(4);

        return view('ManageReportView.owner.reportList', ['report' => $report]);
    }

    public function destroyReport(String $id){
        $report = Report::find($id);

        $report->delete();

        return redirect()->route('owner.display.report')->with('destroy', 'A report deleted successfully!');
    }

    // Display the report creation view
    public function createReport()
    {
        if (Auth::user()->type === 'admin') {
            return view('ManageReportView.admin.createReport');
        } elseif (Auth::user()->type === 'owner') {
            return view('ManageReportView.owner.createReport');
        } elseif (Auth::user()->type === 'staff') {
            return view('ManageReportView.staff.createReport');
        }

        // return view('ManageReportView.owner.createReport');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'report_type' => 'required|in:financial,inventory',
            'duration_type' => 'required|in:daily,monthly',
            'date' => 'nullable|date',
            'month' => 'nullable|integer|min:1|max:12',
        ]);
        $reportType = $validated['report_type'];
        $durationType = $validated['duration_type'];
        $date = $validated['date'] ?? null;
        $month = $validated['month'] ?? null;
        $data = [];
        $reportTitle = '';
        $summary = [
            'opening_balance' => 0,
            'total_revenue' => 0,
            'total_expenses' => 0,
            'net_balance' => 0,
            'closing_balance' => 0,
            'total_product' => 0,
            'low_stock_product' => 0,
            'out_of_stock_product' => 0,
            'expired_product' => 0,
            'expiring_soon_product' => 0,
            'total_inventory_value' => 0,
        ];
        // Handle Financial Report
        if ($reportType === 'financial') {
            if ($durationType === 'daily' && $date) {
                $data = Record::whereDate('created_at', $date)->get();
                $reportTitle = "Daily Financial Report - $date";
                $firstRecord = Record::whereDate('created_at', $date)->orderBy('created_at')->first();
                $lastRecord = Record::whereDate('created_at', $date)->orderBy('created_at', 'desc')->first();
                // Calculate Summary
                $summary['opening_balance'] = $firstRecord?->recordBalance ?? 0;
                $summary['total_revenue'] = $data->sum('recordRevenue');
                $summary['total_expenses'] = $data->sum('recordExpenses');
                $summary['closing_balance'] = $data->last()?->recordBalance ?? $summary['opening_balance'];
                $summary['net_balance'] = $summary['closing_balance'] - $summary['opening_balance'];
            } elseif ($durationType === 'monthly' && $month) {
                $data = Record::whereMonth('created_at', $month)->get();
                $reportTitle = "Monthly Financial Report - " . date('F', mktime(0, 0, 0, $month, 1));
                // Calculate Summary
                $firstRecord = Record::whereMonth('created_at', $month)->orderBy('created_at')->first();
                $lastRecord = Record::whereMonth('created_at', $month)->orderBy('created_at', 'desc')->first();
                $summary['opening_balance'] = $firstRecord?->recordBalance ?? 0;
                $summary['total_revenue'] = $data->sum('recordRevenue');
                $summary['total_expenses'] = $data->sum('recordExpenses');
                $summary['closing_balance'] = $lastRecord?->recordBalance ?? $summary['opening_balance'];
                $summary['net_balance'] = $summary['closing_balance'] - $summary['opening_balance'];
            }
        }
        // Handle Inventory Report
        elseif ($reportType === 'inventory') {
            if ($durationType === 'daily' && $date) {
                $data = Product::whereDate('created_at', $date)->where('productStatus', 1)->get();
                $reportTitle = "Daily Inventory Report - $date";
                $lowStockProduct = Product::whereColumn('productQuantity', '<', 'stockAlert')
                    ->whereDate('created_at', $date)
                    ->get();
                $outOfStockProduct = Product::where('productQuantity', 0)
                    ->whereDate('created_at', $date)
                    ->get();
                $expiredProduct = Product::whereDate('productExpired', '<=', now())
                    ->whereDate('created_at', $date)
                    ->get();
                $expiringSoonProduct = Product::whereDate('expiredAlert', '<=', now())
                    ->whereDate('productExpired', '>', now())
                    ->whereDate('created_at', $date)
                    ->get();
                $totalInventoryValue = Product::whereDate('created_at', $date)->where('productStatus', 1)
                    ->get()
                    ->sum(fn($product) => $product->productQuantity * $product->productCost);
                $totalProduct = Product::where('productStatus', 1)->whereDate('created_at', $date);
                // Calculate Summary
                $summary['total_product'] = $totalProduct->count();
                $summary['low_stock_product'] = $lowStockProduct->count();
                $summary['out_of_stock_product'] = $outOfStockProduct->count();
                $summary['expired_product'] = $expiredProduct->count();
                $summary['expiring_soon_product'] = $expiringSoonProduct->count();
                $summary['total_inventory_value'] = $totalInventoryValue;
            } elseif ($durationType === 'monthly' && $month) {
                $data = Product::whereMonth('created_at', $month)->where('productStatus', 1)->get();
                $reportTitle = "Monthly Inventory Report - " . date('F', mktime(0, 0, 0, $month, 1));
                // Low Stock Products (productQuantity < stockAlert)
                $lowStockProduct = Product::whereColumn('productQuantity', '<', 'stockAlert')
                    ->whereMonth('created_at', $month)
                    ->get();
                // Out of Stock Products (productQuantity = 0)
                $outOfStockProduct = Product::where('productQuantity', 0)
                    ->whereMonth('created_at', $month)
                    ->get();
                // Expired Products (current date >= productExpired)
                $expiredProduct = Product::whereDate('productExpired', '<=', now())
                    ->whereMonth('created_at', $month)
                    ->get();
                // Expiring Soon Products (current date >= expiredAlert AND current date < productExpired)
                $expiringSoonProduct = Product::whereDate('expiredAlert', '<=', now())
                    ->whereDate('productExpired', '>', now())
                    ->whereMonth('created_at', $month)
                    ->get();
                // Total Inventory Value (sum of productQuantity * productCost)
                $totalInventoryValue = Product::whereMonth('created_at', $month)
                    ->get()
                    ->sum(fn($product) => $product->productQuantity * $product->productCost);
                //Total available products
                $totalProduct = Product::where('productStatus', 1)
                    ->whereMonth('created_at', $month); // Ensure the current year is considered
                // Calculate Summary
                $summary['total_product'] = $totalProduct->count();
                $summary['low_stock_product'] = $lowStockProduct->count();
                $summary['out_of_stock_product'] = $outOfStockProduct->count();
                $summary['expired_product'] = $expiredProduct->count();
                $summary['expiring_soon_product'] = $expiringSoonProduct->count();
                $summary['total_inventory_value'] = $totalInventoryValue;
            }
        }
        if ($data->isEmpty()) {
            return back()->with('destroy', 'No data found for the selected criteria.');
        }
        $company = Company::first();
        // Generate PDF
        $pdf = PDF::loadView('ManageReportView.owner.reportTemplate', [
            'data' => $data,
            'reportTitle' => $reportTitle,
            'company' => $company,
            'summary' => $summary,
            'lowStockProduct' => $lowStockProduct ?? [],
            'outOfStockProduct' => $outOfStockProduct ?? [],
            'expiredProduct' => $expiredProduct ?? [],
            'expiringSoonProduct' => $expiringSoonProduct ?? [],
        ]);
        $fileName = strtolower(str_replace(' ', '_', time() . $reportTitle)) . '.pdf';

        // Save the file in the public/report directory
        file_put_contents(public_path('report/' . $fileName), $pdf->output());

        // Save report to the database
        $userId = Auth::id(); // Assuming the user is authenticated.
        Report::create([
            'userId' => $userId,
            'reportTitle' => $reportTitle,
            'reportFile' => $fileName,
        ]);

        return redirect()->route('report.download', ['fileName' => $fileName])
            ->with('success', 'Report generated successfully!');
    }



    // Download Report
    public function download($fileName)
    {
        $filePath = public_path('report/' . $fileName);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return back()->with('destroy', 'Report file not found.');
    }
}
