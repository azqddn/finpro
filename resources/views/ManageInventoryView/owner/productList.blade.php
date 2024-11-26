@extends('layouts.ownerNav')

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
                <h3 class="my-4">
                    Inventory
                </h3>

                {{-- Main --}}
                <div class="row justify-content-center"
                    style="width: 100%; height:auto; background-color:white; border-radius:10px;box-shadow: 2px 3px 6px #0213ff42;">
                    {{-- Top --}}
                    <div class="d-flex align-items-center" style="height: 80px; width:100%;">

                        {{-- Search --}}
                        <div class="d-flex justify-content-center align-items-center ms-5"
                            style="width: 100%; margin-right: auto; margin-left:28px">
                            <div class="d-flex align-items-center pt-3 ps-2 pe-2"
                                style="border: 1px solid rgb(134, 134, 134); border-radius:10px; width:400px; height:35px">
                                <form action="{{ route('display.product.owner') }}" method="GET"
                                    class="d-flex justify-content-between align-items-center"
                                    style="width:100%; border-radius:10px">
                                    <input type="text" placeholder="Search" name="search"
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

                        {{-- Alert Message --}}
                        <div class="me-3">
                            @if ($alertMessage->isNotEmpty())
                                <a href="{{ route('display.product.alert.owner') }}">
                                    <svg width="18" height="18" viewBox="0 0 20 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10 5H3.80217L2.24662 12H7C7 13.6569 8.3431 15 10 15C11.6569 15 13 13.6569 13 12H17.7534L17.2514 9.74115C17.9333 9.53306 18.5555 9.20679 19.0887 8.78913L19.9762 12.7831C19.992 12.8543 20 12.927 20 13V20C20 20.5523 19.5523 21 19 21H1C0.44772 21 0 20.5523 0 20V13C0 12.927 0.00798988 12.8543 0.0238099 12.7831L2.02381 3.78307C2.12549 3.32553 2.5313 3 3 3H10.416C10.1484 3.61246 10 4.2889 10 5ZM10 17C12.0503 17 13.8124 15.7659 14.584 14H18V19H2V14H5.41604C6.1876 15.7659 7.94968 17 10 17Z"
                                            fill="#444444" />
                                        <circle cx="15.5" cy="4.5" r="4.5" fill="#FF0000" />
                                    </svg>
                                </a>
                            @else
                                <a href="{{ route('display.product.alert.owner') }}">
                                    <svg style="color: #292929" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        width="18" height="18" fill="currentColor">
                                        <path
                                            d="M21 3C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H21ZM7.41604 14H4V19H20V14H16.584C15.8124 15.7659 14.0503 17 12 17C9.94968 17 8.1876 15.7659 7.41604 14ZM20 5H4V12H9C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12H20V5Z">
                                        </path>
                                    </svg>
                                </a>
                            @endif
                        </div>

                        {{-- Menu --}}
                        <div class="dropdown" style="margin-left: auto; margin-right: 20px;">
                            <div style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"
                                    fill="currentColor">
                                    <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
                                </svg>
                            </div>

                            <!-- Dropdown Menu -->
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('add.product.owner') }}">Add Product</a>
                                </li>
                                <hr>
                                <li>
                                    <a class="dropdown-item" href="{{ route('display.product.history.owner') }}">Product
                                        History</a>
                                </li>
                                <hr>
                                <li>
                                    <a class="dropdown-item" href="{{ route('display.edit.history') }}">Edit History</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Table --}}
                    <table class="table" style="width:97%; overflow: hidden; border: 1px solid #dee2e6; border-radius:7px">
                        <thead style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6">

                            <tr>
                                <th scope="col"
                                    style="border: 1px solid #dee2e6; color:rgba(10, 2, 255, 0.911); height:50px">
                                    No.</th>
                                <th scope="col" style="border: 1px solid #dee2e6; color:rgba(10, 2, 255, 0.911);">Product
                                </th>
                                <th scope="col" style="border: 1px solid #dee2e6; color:rgba(10, 2, 255, 0.911);">Cost
                                    (RM)
                                </th>
                                <th scope="col" style="border: 1px solid #dee2e6; color:rgba(10, 2, 255, 0.911);">Price
                                    (RM)
                                </th>
                                <th scope="col" style="border: 1px solid #dee2e6; color:rgba(10, 2, 255, 0.911);">
                                    Category</th>
                                <th scope="col" style="border: 1px solid #dee2e6; color:rgba(10, 2, 255, 0.911);">Expired
                                    Date
                                </th>
                                <th scope="col" style="border: 1px solid #dee2e6; color:rgba(10, 2, 255, 0.911);">
                                    Quantity</th>
                                <th scope="col"
                                    style="border: 1px solid #dee2e6; color:rgba(10, 2, 255, 0.911);; width:50px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $product)
                                <tr>
                                    <th scope="row" style="border: 1px solid #dee2e6;">{{ $loop->iteration }}</th>
                                    <td style="border: 1px solid #dee2e6;">{{ $product->productName }}</td>
                                    <td style="border: 1px solid #dee2e6;">{{ $product->productCost }}</td>
                                    <td style="border: 1px solid #dee2e6;">{{ $product->productSell }}</td>
                                    <td style="border: 1px solid #dee2e6;">{{ $product->category->categoryName }}</td>
                                    <td style="border: 1px solid #dee2e6;">
                                        {{ \Carbon\Carbon::parse($product->productExpired)->format('d-m-Y') }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6;">{{ $product->productQuantity }}</td>
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
                                                {{-- Edit --}}
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('owner/edit/' . $product->id . '/product') }}">
                                                        Edit
                                                    </a>
                                                </li>
                                                <hr style="margin: 4px 0;">
                                                {{-- Remove --}}
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#removeModal"
                                                        onclick="populateModal({{ json_encode($product) }})">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
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


{{-- Remove Product --}}
<div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%)">

        {{-- Content --}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight:bold" id="productModalLabel">Remove Product</h5>
            </div>
            <h5 class="mx-3">
                The "<span id="productModalName"></span>" product will be removed from the product list.
            </h5>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                {{-- Form to remove the product --}}
                <form method="POST" action="" id="removeForm">
                    @csrf
                    <input type="hidden" id="productId" name="productId">
                    {{-- change the value of product status and pass to the controller --}}
                    <input type="hidden" id="productStatus" name="productStatus" value="0">
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
