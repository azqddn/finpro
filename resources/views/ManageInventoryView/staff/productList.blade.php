@extends('layouts.staffNav')

@section('content')
    <div style="width: 85%; height:auto; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto">
            {{-- Content --}}
            <div class="mt-4 me-3 row justify-content-center" style="width:95%; height:auto; margin-left:20px">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }};
                    </div>
                @elseif (session('destroy'))
                    <div class="alert alert-danger">
                        {{ session('destroy') }};
                    </div>
                @endif
                <h3 class="mb-4">
                    Inventory
                </h3>

                {{-- Main --}}
                <div class="row justify-content-center px-4"
                    style="width: 100%; height:auto; background-color:white; border-radius:10px; box-shadow: 2px 3px 6px #4b4b4b42;">
                    {{-- Top --}}
                    <div class="d-flex align-items-center px-0" style="height: 80px; width:100%;">

                        {{-- Sorting icon --}}
                        <div class="dropdown me-5">
                            <div style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    fill="currentColor">
                                    <path d="M10 18H14V16H10V18ZM3 6V8H21V6H3ZM6 13H18V11H6V13Z"></path>
                                </svg>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item"
                                        href="{{ route('display.product.staff', ['sort' => 'a_to_z']) }}">From A to Z</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('display.product.staff', ['sort' => 'price_low_high']) }}">Price Low
                                        to High</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('display.product.staff', ['sort' => 'price_high_low']) }}">Price High
                                        to Low</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('display.product.staff', ['sort' => 'cost_low_high']) }}">Cost Low to
                                        High</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('display.product.staff', ['sort' => 'cost_high_low']) }}">Cost High
                                        to Low</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('display.product.staff', ['sort' => 'low_stock']) }}">Low/Out of
                                        Stock</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('display.product.staff', ['sort' => 'expired_soon']) }}">Expired/Expiry
                                        Soon</a></li>
                            </ul>
                        </div>

                        {{-- Search --}}
                        <div class="d-flex justify-content-center align-items-center ms-5"
                            style="width: 100%; margin-right: auto; margin-left:28px">
                            <div class="d-flex align-items-center pt-3 ps-2 pe-2"
                                style="border: 1px solid rgb(134, 134, 134); border-radius:10px; width:400px; height:35px; box-shadow: 1px 1px 10px #00000042;">
                                <form action="{{ route('display.product.staff') }}" method="GET"
                                    class="d-flex justify-content-between align-items-center"
                                    style="width:100%; border-radius:10px">
                                    <input type="text" placeholder="Search by Product Name" name="search"
                                        value="{{ request()->input('search') }}"
                                        style="border: none; outline: none; color:rgb(61, 61, 61); width:100%" />
                                    <button style="border: none; outline: none; background-color:transparent">
                                        <svg style="color: grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            width="18" height="18" fill="currentColor">
                                            <path
                                                d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Add Product icon --}}
                        <div class="me-3">
                            <a href="{{ route('add.product.staff') }}" style="text-decoration: none;">
                                <button type="button" class="btn btn-light d-flex align-items-center"
                                    style="box-shadow: 2px 3px 6px #4b4b4b42; gap: 8px; width:150px">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                        height="16" fill="currentColor">
                                        <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                                    </svg>
                                    <span>New Product</span>
                                </button>
                            </a>
                        </div>


                        {{-- Menu --}}
                        <div class="dropdown" style="margin-left: auto;">
                            <a class="btn dropdown-toggle " href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false" style="width: 60px; height:35px">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="auto"
                                    fill="currentColor">
                                    <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
                                </svg>
                            </a>

                            <!-- Dropdown Menu -->
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="{{ route('display.product.history.staff') }}">Product
                                        History</a></li>
                                <li><a class="dropdown-item" href="{{ route('display.edit.history.staff') }}">Edit History</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="d-flex ps-0 align-items-center justify-content-start">
                        <div class="d-flex align-items-center me-3">
                            <span style="border: 1px solid #999999; border-radius: 5px; width: 12px; height: 12px; background-color: yellow;"></span>
                            <span class="ms-2 small">Expiry Alert</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span style="border: 1px solid #999999; border-radius: 5px; width: 12px; height: 12px; background-color: rgb(255, 68, 68);"></span>
                            <span class="ms-2 small">Stock Alert</span>
                        </div>
                    </div>

                    {{-- Table --}}
                    <table id="product-list-table" class="table table-bordered mt-3">
                        <thead style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6">

                            <tr>
                                <th scope="col" style="border: 1px solid #dee2e6">
                                    No.</th>
                                <th scope="col" style="border: 1px solid #dee2e6; ">Product
                                </th>
                                <th scope="col" style="border: 1px solid #dee2e6; ">Cost
                                    (RM)
                                </th>
                                <th scope="col" style="border: 1px solid #dee2e6; ">Price
                                    (RM)
                                </th>
                                <th scope="col" style="border: 1px solid #dee2e6; ">
                                    Category</th>
                                <th scope="col" style="border: 1px solid #dee2e6; ">Expired
                                    Date
                                </th>
                                <th scope="col" style="border: 1px solid #dee2e6; ">
                                    Quantity
                                </th>
                                <th scope="col" style="border: 1px solid #dee2e6; ">
                                    Trend
                                </th>
                                <th scope="col" style="border: 1px solid #dee2e6; ; width:35px">
                                </th>
                            </tr>
                        </thead>
                        {{-- Display product list --}}
                        <tbody>
                            @foreach ($products as $product)
                                <tr
                                    style="background-color: {{ $product->productQuantity <= $product->stockAlert ? 'rgb(255, 226, 226)' : 'transparent' }}">
                                    <th scope="row" style="border: 1px solid #dee2e6;">{{ $loop->iteration }}</th>
                                    <td style="border: 1px solid #dee2e6;">{{ $product->productName }}</td>
                                    <td style="border: 1px solid #dee2e6;">{{ $product->productCost }}</td>
                                    <td style="border: 1px solid #dee2e6;">{{ $product->productSell }}</td>
                                    <td style="border: 1px solid #dee2e6;">{{ $product->category->categoryName }}</td>
                                    <td
                                        style="border: 1px solid #dee2e6; {{ \Carbon\Carbon::now()->isSameDay(\Carbon\Carbon::parse($product->expiredAlert)) || \Carbon\Carbon::now()->isAfter(\Carbon\Carbon::parse($product->expiredAlert)) ? 'background-color: rgb(255, 251, 178);' : '' }}">
                                        @if (
                                            \Carbon\Carbon::now()->isSameDay(\Carbon\Carbon::parse($product->expiredAlert)) ||
                                                \Carbon\Carbon::now()->isAfter(\Carbon\Carbon::parse($product->expiredAlert)))
                                            <span
                                                style="color: rgb(0, 0, 0);">{{ \Carbon\Carbon::parse($product->productExpired)->format('d-m-Y') }}</span>
                                        @else
                                            <span>{{ \Carbon\Carbon::parse($product->productExpired)->format('d-m-Y') }}</span>
                                        @endif
                                    </td>
                                    <td
                                        style="border: 1px solid #dee2e6; {{ $product->productQuantity <= $product->stockAlert ? 'background-color: rgb(255, 186, 186);' : '' }}">
                                        @if ($product->productQuantity <= $product->stockAlert)
                                            <span style="">{{ $product->productQuantity }}</span>
                                        @else
                                            <span>{{ $product->productQuantity }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->transactions }}</td>
                                    <td style="border: 1px solid #dee2e6;">
                                        <div class="dropdown">
                                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-expanded="false" style="color: #000000;">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    width="18" height="18" fill="currentColor">
                                                    <path
                                                        d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                style="min-width: 100px; font-size: 14px; padding: 4px;">
                                                {{-- Proof Document --}}
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ asset('product/' . $product->productProof) }}"
                                                        target="_blank">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            width="16" height="16" fill="currentColor">
                                                            <path
                                                                d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <hr style="margin: 4px 0;">
                                                {{-- Edit --}}
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('staff/edit/' . $product->id . '/product') }}">
                                                        Edit
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="paginate" class="d-flex justify-content-center" class="">{{ $products->appends(request()->query())->links() }}

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

{{-- JS to  populate the modal with the clicked product's data. --}}
<script>
    function populateModal(product) {
        //Remove product data
        document.getElementById('productModalName').textContent = product.productName;
        document.getElementById('productId').value = product.id;
        const formAction = `/owner/remove/${product.id}/product`;
        document.getElementById('removeForm').action = formAction;

        //Edit product data
        document.getElementById('categoryId').value = product.categoryId;
        document.getElementById('productName').value = product.productName;
        document.getElementById('productCost').value = product.productCost;
        document.getElementById('productSell').value = product.productSell;
        document.getElementById('category').value = category.id;
        document.getElementById('productQuantity').value = product.productQuantity;
        document.getElementById('stockAlert').value = product.stockAlert;
        document.getElementById('productExpired').value = product.productExpired;
        document.getElementById('expiredAlert').value = product.expiredAlert;

    }
</script>



<style>
    #product-list-table th {
        color: #9f9f9f;
    }
</style>
