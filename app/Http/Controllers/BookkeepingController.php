<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\InventoryTransaction;
use Illuminate\Support\Facades\Auth;

class BookkeepingController extends Controller
{
    /**
     * 
     * BUSINESS OWNERRR ONLYY
     * 
     */

    /**
     * Display All Bookkeeping Record
     */
    public function displayRecord(Request $request)
    {
        // $product = Product::all();
        $product = Product::where('productStatus', '=', '1')->get(); //only active product only (exclude removed product where the productStatus = 0)

        // Only select the record with status 1/2 (closed/opened) only. (exclude 0 = removed record)
        $recordQuery = Record::where('recordStatus', '!=', '0')->with('inventoryTransaction');

        // Handle Searching function
        $search = $request->input('search');
        if ($search) {
            $recordQuery = $recordQuery->where('recordDesc', 'like', "%$search%");
        }

        // Handle Sorting
        $sort = $request->input('sort');

        switch ($sort) {
            case 'revenue_low_high':
                $recordQuery->orderBy('recordRevenue', 'asc');
                break;
            case 'revenue_high_low':
                $recordQuery->orderBy('recordRevenue', 'desc');
                break;
            case 'expense_low_high':
                $recordQuery->orderBy('recordExpenses', 'asc');
                break;
            case 'expense_high_low':
                $recordQuery->orderBy('recordExpenses', 'desc');
                break;
            case 'balance_low_high':
                $recordQuery->orderBy('recordBalance', 'asc');
                break;
            case 'balance_high_low':
                $recordQuery->orderBy('recordBalance', 'desc');
                break;
            case 'oldest':
                $recordQuery->orderBy('created_at', 'asc');
                break;
            case 'newest':
            default:
                $recordQuery->orderBy('created_at', 'desc');  // Default sorting by created_at (newest first)
                break;
        }

        // Get the latest record for the current user
        $latestRecord = Record::latest()->first();

        // Paginate the result
        $record = $recordQuery->paginate(20);

        if (Auth::user()->type === 'admin') {
            return view('ManageBookkeepingView.admin.recordList', ['product' => $product, 'latestRecord' => $latestRecord, 'record' => $record]);
        } elseif (Auth::user()->type === 'owner') {
            return view('ManageBookkeepingView.owner.recordList', ['product' => $product, 'latestRecord' => $latestRecord, 'record' => $record]);
        }
        elseif (Auth::user()->type === 'staff') {
            return view('ManageBookkeepingView.staff.recordList', ['product' => $product, 'latestRecord' => $latestRecord, 'record' => $record]);
        }

        // return view('ManageBookkeepingView.owner.recordList', ['product' => $product, 'latestRecord' => $latestRecord, 'record' => $record]);
    }


    /**
     * Store Opening Record
     */
    public function storeOpeningRecord(Request $request)
    {
        // Validate the request
        $request->validate([
            'recordDesc' => 'required|string',
        ]);

        // Get the latest balance (or initialize to 0 if no previous records exist)
        $latestRecord = Record::latest()->first();
        $currentBalance = $latestRecord ? $latestRecord->recordBalance : 0;

        // Create a new "Opening" record
        $record = new Record();
        $record->userId = Auth::user()->id;
        $record->recordDesc = $request->recordDesc;
        $record->recordRevenue = null;
        $record->recordExpenses = null;
        $record->recordBalance = $currentBalance;  // Set initial balance to 0 or the latest balance
        $record->recordStatus = 2; // Opened status
        $record->save();

        // Return a JSON response for AJAX success
        return response()->json([
            'success' => true,
            'message' => 'Opening record created successfully!',
        ]);
    }


    /**
     * Store Closing Record
     */
    public function storeClosingRecord(Request $request)
    {
        // Validate the request
        $request->validate([
            'recordDesc' => 'required|string',
        ]);

        // Get the latest balance from the most recent record
        $latestRecord = Record::latest()->first();
        if (!$latestRecord) {
            return response()->json([
                'success' => false,
                'message' => 'No opening record found to close.',
            ]);
        }

        // Create a new "Closing" record
        $record = new Record();
        $record->userId = Auth::user()->id;
        $record->recordDesc = $request->recordDesc;
        $record->recordBalance = $latestRecord->recordBalance;  // Use the previous record's balance
        $record->recordRevenue = null;
        $record->recordExpenses = null;
        $record->recordStatus = 1; // Closed status
        $record->save();

        // Return a JSON response for AJAX success
        return response()->json([
            'success' => true,
            'message' => 'Closing record created successfully!',
        ]);
    }

    /**
     * Store Record
     */
    public function storeRecord(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'recordType' => 'required|string',
            'recordDesc' => 'required|string',
            'recordRevenue' => 'nullable|numeric',
            'recordExpenses' => 'nullable|numeric',
            'recordNotes' => 'nullable|string',
            'recordProof' => 'nullable|mimes:pdf,jpeg,jpg,png|max:2048', // Limit file size to 2MB
            'transId' => 'nullable|array', // Ensure transId is an array for transactions
            'quantity' => 'nullable|array', // Ensure quantity is an array
        ]);

        // Retrieve the latest recordBalance from the most recent record
        $latestRecord = Record::orderBy('id', 'desc')->first();
        $latestBalance = $latestRecord ? $latestRecord->recordBalance : 0; // Default to 0 if no records exist

        // Create a new Record instance
        $record = new Record();
        $record->userId = Auth::user()->id;
        $record->recordDesc = $request->recordDesc;
        $record->recordNotes = $request->recordNotes;
        $record->recordStatus = 2; // Opened status

        // Handle different record types: Revenue or Expenses
        if ($request->recordType === 'revenue') {
            $record->recordRevenue = $request->recordRevenue;
            $record->recordExpenses = null;  // Ensure expenses is null for revenue
            $record->recordBalance = $latestBalance + $request->recordRevenue; // Add revenue to balance
        } elseif ($request->recordType === 'expenses') {
            $record->recordRevenue = null;  // Ensure revenue is null for expenses
            $record->recordExpenses = $request->recordExpenses;
            $record->recordBalance = $latestBalance - $request->recordExpenses; // Subtract expenses from balance
        }

        // Handle file upload for record proof
        $filePath = public_path('bookkeeping');
        if ($request->hasFile('recordProof')) {
            $file = $request->file('recordProof');
            $file_name = time() . $file->getClientOriginalName();
            $file->move($filePath, $file_name);
            $record->recordProof = $file_name;
        }

        // Save the record to the database
        $record->save();

        // Handle Inventory Transactions
        if ($request->has('transId') && $request->has('quantity')) {
            $transProducts = []; // Array to store concatenated product details

            foreach ($request->transId as $key => $productName) {
                // Validate quantity
                $quantity = $request->quantity[$key];
                if (!$quantity || $quantity <= 0) {
                    continue; // Skip invalid or empty quantities
                }

                // Find the product by its name
                $product = Product::where('productName', $productName)->first();
                if ($product) {
                    // Deduct the quantity from the product's current stock
                    $product->productQuantity -= $quantity;
                    $product->transactions += $quantity;
                    $product->save();

                    // Add the product details to the array
                    $transProducts[] = "$productName: $quantity";
                }
            }

            if (!empty($transProducts)) {
                // Concatenate all product details into a single string
                $transProductString = implode(', ', $transProducts);

                // Create a new inventory transaction
                $transaction = new InventoryTransaction();
                $transaction->transProduct = $transProductString;
                $transaction->save();

                // Associate the transaction with the record
                $record->transId = $transaction->id;
                $record->save();
            }
        }

        // Return a response (optional)
        return redirect()->back()->with('success', 'Record and inventory transactions added successfully!');
    }



    /**
     * Remove the record from the table
     */
    public function removeRecord(Request $request, $id)
    {
        $record = Record::where('id', $id)->first();

        $request->validate([
            'recordStatus' => ['required', 'integer'],
        ]);

        $record->recordStatus = $request->recordStatus;
        $record->save();

        return redirect()->route('display.record.owner')->with('destroy', 'A record has been removed successfully');
    }
}
