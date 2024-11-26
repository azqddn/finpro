<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Product;
use Illuminate\Http\Request;
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
    public function displayRecord()
    {
        $product = Product::all();
        // Only select the record with status 1/2 (closed/opened) only. (exclude 0 = removed record)
        $record = Record::where('recordStatus', '!=', '0')->get();

        // Get the latest record for the current user
        $latestRecord = Record::where('userId', Auth::user()->id)->latest()->first();

        return view('ManageBookkeepingView.owner.recordList', ['product' => $product, 'latestRecord' => $latestRecord, 'record' => $record]);
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
        $latestRecord = Record::where('userId', Auth::user()->id)->latest()->first();
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
        $latestRecord = Record::where('userId', Auth::user()->id)->latest()->first();
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
            'recordProof' => 'nullable|mimes:pdf,jpeg,jpg,png|max:2048', // Limit the file size to 2MB
        ]);

        // Retrieve the latest recordBalance from the most recent record
        $latestRecord = Record::orderBy('id', 'desc')->first();
        $latestBalance = $latestRecord ? $latestRecord->recordBalance : 0; // Set to 0 if no records exist

        // Create a new Record instance
        $record = new Record();
        $record->userId = Auth::user()->id;
        $record->recordDesc = $request->recordDesc;
        $record->recordNotes = $request->recordNotes;
        $record->recordStatus = 2;

        // Handle different record types: Revenue or Expenses
        if ($request->recordType === 'revenue') {
            $record->recordRevenue = $request->recordRevenue;
            $record->recordExpenses = null;  // Ensure expenses is null for revenue
            // Update recordBalance by adding the revenue to the latest balance
            $record->recordBalance = $latestBalance + $request->recordRevenue;
        } elseif ($request->recordType === 'expenses') {
            $record->recordRevenue = null;  // Ensure revenue is null for expenses
            $record->recordExpenses = $request->recordExpenses;
            // Update recordBalance by subtracting the expenses from the latest balance
            $record->recordBalance = $latestBalance - $request->recordExpenses;
        }

        // Handle file upload for record proof
        $filePath = public_path('bookkeeping');
        if ($request->hasFile('recordProof')) {
            $file = $request->file('recordProof');
            $file_name = time() . $file->getClientOriginalName();
            $file->move($filePath, $file_name);
            $record->recordProof = $file_name;
        }

        // Save the new record to the database
        $record->save();

        // Return a response (optional)
        return redirect()->back()->with('success', 'Record added successfully!');
    }

    /**
     * Remove the record from the table
     */
    public function removeRecord(Request $request, $id)
    {
        $record = Record::where('id', $id)->first();

        $request -> validate([
            'recordStatus' => ['required', 'integer'],
        ]);

        $record->recordStatus = $request->recordStatus;
        $record->save();

        return redirect()->route('display.record.owner')->with('destroy', 'A record has been removed successfully');
    }
}
