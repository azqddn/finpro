<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Record;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** 
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        // Fetch financial records data
        $records = Record::selectRaw(
            'MONTH(created_at) as month, 
        SUM(recordRevenue) as totalRevenue, 
        SUM(recordExpenses) as totalExpenses, 
        SUM(recordBalance) as totalBalance'
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = [];
        $revenues = [];
        $expenses = [];
        $balances = [];

        foreach ($records as $record) {
            $months[] = date('F', mktime(0, 0, 0, $record->month, 1)); // Month name
            $revenues[] = $record->totalRevenue ?? 0;
            $expenses[] = $record->totalExpenses ?? 0;
            $balances[] = $record->totalBalance ?? 0;
        }

        // Fetch product trends
        $products = Product::select(
            'productName',
            'transactions',
            'productSell'
        )->whereNotNull('transactions')->get();

        $productNames = [];
        $productSales = [];
        $productQuantities = [];

        foreach ($products as $product) {
            $productNames[] = $product->productName;
            $productSales[] = $product->transactions * $product->productSell;
            $productQuantities[] = $product->transactions;
        }

        // Fetch total available products with productStatus = 1
        $totalAvailableProducts = Product::where('productStatus', 1)->count();
        $totalRevenue = Record::sum('recordRevenue');
        $totalExpenses = Record::sum('recordExpenses');

        //Fetch Users
        $user = User::all();
        $totalUsers = User::count();

        return view('adminDashboard', [
            'months' => $months,
            'revenues' => $revenues,
            'expenses' => $expenses,
            'balances' => $balances,
            'productNames' => $productNames,
            'productSales' => $productSales,
            'productQuantities' => $productQuantities,
            'totalAvailableProducts' => $totalAvailableProducts,
            'totalRevenue' =>$totalRevenue,
            'totalExpenses' =>$totalExpenses,
            'user' =>$user,
            'totalUsers' =>$totalUsers,
        ]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ownerHome(): View
    {
        // Fetch financial records data
        $records = Record::selectRaw(
            'MONTH(created_at) as month, 
        SUM(recordRevenue) as totalRevenue, 
        SUM(recordExpenses) as totalExpenses, 
        SUM(recordBalance) as totalBalance'
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = [];
        $revenues = [];
        $expenses = [];
        $balances = [];

        foreach ($records as $record) {
            $months[] = date('F', mktime(0, 0, 0, $record->month, 1)); // Month name
            $revenues[] = $record->totalRevenue ?? 0;
            $expenses[] = $record->totalExpenses ?? 0;
            $balances[] = $record->totalBalance ?? 0;
        }

        // Fetch product trends
        $products = Product::select(
            'productName',
            'transactions',
            'productSell'
        )->where('productStatus', 1)->whereNotNull('transactions')->get();

        $productNames = [];
        $productSales = [];
        $productQuantities = [];

        foreach ($products as $product) {
            $productNames[] = $product->productName;
            $productSales[] = $product->transactions * $product->productSell;
            $productQuantities[] = $product->transactions;
        }

        // Fetch total available products with productStatus = 1
        $totalAvailableProducts = Product::where('productStatus', 1)->count();
        $totalRevenue = Record::sum('recordRevenue');
        $totalExpenses = Record::sum('recordExpenses');

        return view('ownerDashboard', [
            'months' => $months,
            'revenues' => $revenues,
            'expenses' => $expenses,
            'balances' => $balances,
            'productNames' => $productNames,
            'productSales' => $productSales,
            'productQuantities' => $productQuantities,
            'totalAvailableProducts' => $totalAvailableProducts,
            'totalRevenue' =>$totalRevenue,
            'totalExpenses' =>$totalExpenses,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function staffHome(): View
    {
         // Fetch financial records data
         $records = Record::selectRaw(
            'MONTH(created_at) as month, 
        SUM(recordRevenue) as totalRevenue, 
        SUM(recordExpenses) as totalExpenses, 
        SUM(recordBalance) as totalBalance'
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = [];
        $revenues = [];
        $expenses = [];
        $balances = [];

        foreach ($records as $record) {
            $months[] = date('F', mktime(0, 0, 0, $record->month, 1)); // Month name
            $revenues[] = $record->totalRevenue ?? 0;
            $expenses[] = $record->totalExpenses ?? 0;
            $balances[] = $record->totalBalance ?? 0;
        }

        // Fetch product trends
        $products = Product::select(
            'productName',
            'transactions',
            'productSell'
        )->whereNotNull('transactions')->get();

        $productNames = [];
        $productSales = [];
        $productQuantities = [];

        foreach ($products as $product) {
            $productNames[] = $product->productName;
            $productSales[] = $product->transactions * $product->productSell;
            $productQuantities[] = $product->transactions;
        }

        // Fetch total available products with productStatus = 1
        $totalAvailableProducts = Product::where('productStatus', 1)->count();
        $totalRevenue = Record::sum('recordRevenue');
        $totalExpenses = Record::sum('recordExpenses');

        return view('staffHome', [
            'months' => $months,
            'revenues' => $revenues,
            'expenses' => $expenses,
            'balances' => $balances,
            'productNames' => $productNames,
            'productSales' => $productSales,
            'productQuantities' => $productQuantities,
            'totalAvailableProducts' => $totalAvailableProducts,
            'totalRevenue' =>$totalRevenue,
            'totalExpenses' =>$totalExpenses,
        ]);
    }
}
