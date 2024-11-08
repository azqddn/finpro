<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\EditedProduct;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{

    /**
     * 
     * BUSINESS OWNERRRR
     * 
     */

    /**
     * Display list of products
     */
    public function displayProduct(Request $request)
    {
        $search = $request->input('search'); // Get search query from request

        $productQuery = Product::with('category')->where('productStatus', '1');

        // If there is a search term, filter the products by product name
        if ($search) {
            $productQuery->where('productName', 'LIKE', "%{$search}%");
        }

        $product = $productQuery->get();
        $category = Category::all();

        // For Alert Message
        $currentDate = now();
        $alertMessage = Product::with('category')
        ->where('productStatus', '1') // Only active products
        ->where(function ($query) use ($currentDate) {
            $query->whereColumn('productQuantity', '<=', 'stockAlert') // Low stock alert
                ->orWhere('expiredAlert', '<=', $currentDate); // Expired or nearing expiration
        })
        ->get();

        return view('ManageInventoryView.owner.productList', ['product' => $product, 'category' => $category, 'alertMessage' => $alertMessage ]);
    }


    /**
     * Display create product form
     */
    public function createProduct()
    {
        $category = Category::all();
        return view('ManageInventoryView.owner.addProduct', compact('category'));
    }

    /**
     * Store New Product
     */
    public function storeProduct(Request $request)
    {
        $request->validate([
            'productName' => ['required', 'string', 'max:255'],
            'categoryId' => ['required', 'exists:categories,id'],
            'productCost' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
            'productSell' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
            'productQuantity' => ['required', 'integer'],
            'stockAlert' => ['required', 'integer'],
            'productExpired' => ['nullable', 'date'],
            'expiredAlert' => ['nullable', 'date'],
            'productProof' => ['mimes:png,jpeg,jpg,pdf', 'max:2048'],

        ]);

        $product = new Product();

        $product->productName = $request->productName;
        $product->productCost = $request->productCost;
        $product->productSell = $request->productSell;
        $product->productQuantity = $request->productQuantity;
        $product->stockAlert = $request->stockAlert;
        $product->productExpired = $request->productExpired;
        $product->expiredAlert = $request->expiredAlert;
        $product->categoryId = $request->categoryId;
        $product->userId = Auth::user()->id;
        // $product->userId = auth()->user()->id;

        //Proof
        $filePath = public_path('product');

        if ($request->hasFile('productProof')) {
            $file = $request->file('productProof');
            $file_name = time() . $file->getClientOriginalName();
            $file->move($filePath, $file_name);
            $product->productProof = $file_name;
        }

        $product->save();

        return redirect()->route('display.product.owner')->with('success', 'A Product Addedd Successfully!');
    }

    /**
     * Edit Prouct Form
     */
    public function editProduct(String $id)
    {
        $product = Product::with('category')->where('id', $id)->first();
        $category = Category::all();

        return view('ManageInventoryView.owner.editProduct', ['product' => $product, 'category' => $category]);
    }

    /**
     * Update product info
     */
    public function updateProduct(Request $request, $id)
    {
        // Get the product to be updated
        $product = Product::find($id);

        // Create an array to store the fields that were changed
        $fieldsChanged = [];

        // Check if each field has changed, if yes, store the old and new values
        if ($product->productName != $request->input('productName')) {
            $fieldsChanged[] = [
                'fieldChanged' => 'productName',
                'oldValue' => $product->productName,
                'newValue' => $request->input('productName')
            ];
            $product->productName = $request->input('productName');
        }

        if ($product->categoryId != $request->input('categoryId')) {
            $fieldsChanged[] = [
                'fieldChanged' => 'categoryId',
                'oldValue' => $product->category->categoryName, // Storing category name for clarity
                'newValue' => Category::find($request->input('categoryId'))->categoryName
            ];
            $product->categoryId = $request->input('categoryId');
        }

        if ($product->productCost != $request->input('productCost')) {
            $fieldsChanged[] = [
                'fieldChanged' => 'productCost',
                'oldValue' => $product->productCost,
                'newValue' => $request->input('productCost')
            ];
            $product->productCost = $request->input('productCost');
        }

        if ($product->productSell != $request->input('productSell')) {
            $fieldsChanged[] = [
                'fieldChanged' => 'productSell',
                'oldValue' => $product->productSell,
                'newValue' => $request->input('productSell')
            ];
            $product->productSell = $request->input('productSell');
        }

        if ($product->productQuantity != $request->input('productQuantity')) {
            $fieldsChanged[] = [
                'fieldChanged' => 'productQuantity',
                'oldValue' => $product->productQuantity,
                'newValue' => $request->input('productQuantity')
            ];
            $product->productQuantity = $request->input('productQuantity');
        }

        if ($product->stockAlert != $request->input('stockAlert')) {
            $fieldsChanged[] = [
                'fieldChanged' => 'stockAlert',
                'oldValue' => $product->stockAlert,
                'newValue' => $request->input('stockAlert')
            ];
            $product->stockAlert = $request->input('stockAlert');
        }

        if (Carbon::parse($product->productExpired)->toDateString() != Carbon::parse($request->input('productExpired'))->toDateString()) {
            $fieldsChanged[] = [
                'fieldChanged' => 'productExpired',
                'oldValue' => Carbon::parse($product->productExpired)->toDateString(),
                'newValue' => Carbon::parse($request->input('productExpired'))->toDateString()
            ];
            $product->productExpired = $request->input('productExpired');
        }

        if (Carbon::parse($product->expiredAlert)->toDateString() != Carbon::parse($request->input('expiredAlert'))->toDateString()) {
            $fieldsChanged[] = [
                'fieldChanged' => 'expiredAlert',
                'oldValue' => Carbon::parse($product->expiredAlert)->toDateString(),
                'newValue' => Carbon::parse($request->input('expiredAlert'))->toDateString()
            ];
            $product->expiredAlert = $request->input('expiredAlert');
        }

        // Save the changes to the product
        $product->save();

        $filePath = public_path('editedProduct');

        if ($request->hasFile('editProof')) {
            $file = $request->file('editProof');
            $file_name = time() . $file->getClientOriginalName();
            $file->move($filePath, $file_name);
        }

        // Store the changes in the edited_products table
        foreach ($fieldsChanged as $change) {
            EditedProduct::create([
                'fieldChanged' => $change['fieldChanged'],
                'oldValue' => $change['oldValue'],
                'newValue' => $change['newValue'],
                'reason' => $request->input('reason'),
                'editProof' => $file_name,
                'userId' => Auth::user()->id, // Assuming the logged-in user is making the changes
                'productId' => $product->id
            ]);
        }

        // Redirect or return response
        return redirect()->route('display.product.owner');
    }

    /**
     * Display the product edit history
     */
    public function displayEditHistory()
    {
        // Fetch all the edited products with their related products and users
        $editedProducts = EditedProduct::with('product', 'user')
            ->get()
            ->groupBy(function ($item) {
                return \Carbon\Carbon::parse($item->created_at)->format('Y-m-d');
            });

        return view('ManageInventoryView.owner.editProductHistory', ['editedProducts' => $editedProducts]);
    }

    /**
     * Delete Edit History
     */
    public function destroyEditHistory(String $id)
    {
        $editedProduct = EditedProduct::find($id);

        if (!$editedProduct) {
            return redirect()->route('display.product.history.owner')->with('error', 'Product Edit History not found');
        }

        $editedProduct->delete();

        return redirect()->route('display.edit.history')->with('destroy', 'A Product Edit History has been deleted successfully');
    }



    /**
     * Remove Product from the list by changing the status
     */
    public function removeProduct(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        $request->validate([
            'productStatus' => ['required', 'integer'],
        ]);

        $product->productStatus = $request->productStatus;

        $product->save();

        return redirect()->route('display.product.owner')->with('destroy', 'A product has been removed successfully');
    }

    /**
     * Display product history
     */
    public function displayProductHistory()
    {
        $product = Product::with('category', 'user')->get();
        $category = Category::all();

        return view('ManageInventoryView.owner.productHistory', ['product' => $product, 'category' => $category]);
    }

    /**
     * Delete the product from the database
     */
    public function destroyProduct(String $id)
    {
        $product = Product::where('id', $id)->first();

        $product->delete();

        return redirect()->route('display.product.history.owner')->with('destroy', 'A product record deleted');
    }

    /**
     * Display Product Alert (Low stock and Expired Date Alert)
     */
    public function displayProductAlert()
    {
        $currentDate = now(); // Get the current date and time

        $product = Product::with('category')
            ->where('productStatus', '1') // Only active products
            ->where(function ($query) use ($currentDate) {
                $query->whereColumn('productQuantity', '<=', 'stockAlert') // Low stock alert
                    ->orWhere('expiredAlert', '<=', $currentDate); // Expired or nearing expiration
            })
            ->get();

        return view('ManageInventoryView.owner.alertProduct', ['product' => $product]);
    }
}
