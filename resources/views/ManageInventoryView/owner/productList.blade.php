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
                <h3 class="mb-4" style="color: rgb(0, 0, 216)">
                    Inventory
                </h3>

                {{-- Main --}}
                <div class="row justify-content-center px-4"
                    style="width: 100%; height:auto; background-color:white; border-radius:10px; box-shadow: 2px 3px 6px #4b4b4b42;">
                    {{-- Top --}}
                    <div class="d-flex align-items-center px-0" style="height: 80px; width:100%;">

                        {{-- Sorting icon --}}
                        <div class="dropdown me-3">
                            <div style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg width="18" height="18" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.29303 5.707C8.10556 5.51947 8.00024 5.26517 8.00024 5C8.00024 4.73484 8.10556 4.48053 8.29303 4.293L11.293 1.293C11.3853 1.19749 11.4956 1.12131 11.6176 1.0689C11.7396 1.01649 11.8709 0.988904 12.0036 0.987751C12.1364 0.986597 12.2681 1.0119 12.391 1.06218C12.5139 1.11246 12.6255 1.18671 12.7194 1.28061C12.8133 1.3745 12.8876 1.48615 12.9379 1.60905C12.9881 1.73194 13.0134 1.86362 13.0123 1.9964C13.0111 2.12918 12.9835 2.2604 12.9311 2.38241C12.8787 2.50441 12.8025 2.61475 12.707 2.707L9.70703 5.707C9.5195 5.89447 9.26519 5.99979 9.00003 5.99979C8.73487 5.99979 8.48056 5.89447 8.29303 5.707Z"
                                        fill="#444444" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.707 5.707C15.5195 5.89447 15.2652 5.99979 15 5.99979C14.7349 5.99979 14.4806 5.89447 14.293 5.707L11.293 2.707C11.1109 2.5184 11.0101 2.2658 11.0124 2.0036C11.0146 1.7414 11.1198 1.49059 11.3052 1.30518C11.4906 1.11977 11.7414 1.01461 12.0036 1.01233C12.2658 1.01005 12.5184 1.11084 12.707 1.293L15.707 4.293C15.8945 4.48053 15.9998 4.73484 15.9998 5C15.9998 5.26517 15.8945 5.51947 15.707 5.707Z"
                                        fill="#444444" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 3C12.2653 3 12.5196 3.10536 12.7071 3.29289C12.8947 3.48043 13 3.73478 13 4V12C13 12.2652 12.8947 12.5196 12.7071 12.7071C12.5196 12.8946 12.2653 13 12 13C11.7348 13 11.4805 12.8946 11.2929 12.7071C11.1054 12.5196 11 12.2652 11 12V4C11 3.73478 11.1054 3.48043 11.2929 3.29289C11.4805 3.10536 11.7348 3 12 3ZM7.70704 10.293C7.89451 10.4805 7.99983 10.7348 7.99983 11C7.99983 11.2652 7.89451 11.5195 7.70704 11.707L4.70704 14.707C4.51844 14.8892 4.26584 14.99 4.00364 14.9877C3.74144 14.9854 3.49063 14.8802 3.30522 14.6948C3.11981 14.5094 3.01465 14.2586 3.01237 13.9964C3.01009 13.7342 3.11088 13.4816 3.29304 13.293L6.29304 10.293C6.48057 10.1055 6.73488 10.0002 7.00004 10.0002C7.26521 10.0002 7.51951 10.1055 7.70704 10.293Z"
                                        fill="#444444" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.293031 10.293C0.480558 10.1055 0.734866 10.0002 1.00003 10.0002C1.26519 10.0002 1.5195 10.1055 1.70703 10.293L4.70703 13.293C4.80254 13.3852 4.87872 13.4956 4.93113 13.6176C4.98354 13.7396 5.01113 13.8708 5.01228 14.0036C5.01343 14.1364 4.98813 14.2681 4.93785 14.391C4.88757 14.5138 4.81332 14.6255 4.71943 14.7194C4.62553 14.8133 4.51388 14.8875 4.39098 14.9378C4.26809 14.9881 4.13641 15.0134 4.00363 15.0123C3.87085 15.0111 3.73963 14.9835 3.61763 14.9311C3.49562 14.8787 3.38528 14.8025 3.29303 14.707L0.293031 11.707C0.105559 11.5195 0.000244141 11.2652 0.000244141 11C0.000244141 10.7348 0.105559 10.4805 0.293031 10.293Z"
                                        fill="#444444" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4 13C3.73478 13 3.48043 12.8946 3.29289 12.7071C3.10536 12.5196 3 12.2652 3 12V4C3 3.73478 3.10536 3.48043 3.29289 3.29289C3.48043 3.10536 3.73478 3 4 3C4.26522 3 4.51957 3.10536 4.70711 3.29289C4.89464 3.48043 5 3.73478 5 4V12C5 12.2652 4.89464 12.5196 4.70711 12.7071C4.51957 12.8946 4.26522 13 4 13Z"
                                        fill="#444444" />
                                </svg>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#">From A to Z</a></li>
                                <li><a class="dropdown-item" href="#">Price Low to High</a></li>
                                <li><a class="dropdown-item" href="#">Price High to Low</a></li>
                                <li><a class="dropdown-item" href="#">Cost Low to High</a></li>
                                <li><a class="dropdown-item" href="#">Cost High to Low</a></li>
                                <li><a class="dropdown-item" href="#">Create Date</a></li>
                            </ul>
                        </div>

                        {{-- Alert Message --}}
                        {{-- <div class="">
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
                        </div> --}}
                        <div>
                            <svg width="18" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.5611 11.0196C18.4611 11.0196 20 12.5325 20 14.3992C20 16.2648 18.4611 17.7778 16.5611 17.7778C14.6623 17.7778 13.1223 16.2648 13.1223 14.3992C13.1223 12.5325 14.6623 11.0196 16.5611 11.0196ZM8.08329 12.958C8.91551 12.958 9.59106 13.6217 9.59106 14.4393C9.59106 15.2558 8.91551 15.9206 8.08329 15.9206H1.50777C0.675552 15.9206 0 15.2558 0 14.4393C0 13.6217 0.675552 12.958 1.50777 12.958H8.08329ZM3.43887 0C5.33886 0 6.87774 1.51298 6.87774 3.37856C6.87774 5.24523 5.33886 6.75821 3.43887 6.75821C1.53999 6.75821 0 5.24523 0 3.37856C0 1.51298 1.53999 0 3.43887 0ZM18.4933 1.89833C19.3244 1.89833 20 2.56203 20 3.37856C20 4.19618 19.3244 4.85989 18.4933 4.85989H11.9178C11.0856 4.85989 10.4101 4.19618 10.4101 3.37856C10.4101 2.56203 11.0856 1.89833 11.9178 1.89833H18.4933Z" fill="#444444"/>
                                </svg>
                                
                                
                        </div>

                        {{-- Search --}}
                        <div class="d-flex justify-content-center align-items-center ms-0"
                            style="width: 100%; margin-right: auto; margin-left:28px">
                            <div class="d-flex align-items-center pt-3 ps-2 pe-2"
                                style="border: 1px solid rgb(134, 134, 134); border-radius:10px; width:400px; height:35px; box-shadow: 1px 1px 10px #00000042;">
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

                        {{-- Add Product icon --}}
                        <div class="me-3">
                            <a href="{{ route('add.product.owner') }}">
                                <svg width="18" height="18" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.5 1H2.5C1.67157 1 1 1.67157 1 2.5V17.5C1 18.3284 1.67157 19 2.5 19H17.5C18.3284 19 19 18.3284 19 17.5V2.5C19 1.67157 18.3284 1 17.5 1Z"
                                        stroke="#444444" stroke-width="2" stroke-linejoin="round" />
                                    <path d="M10 6V14M6 10H14" stroke="#444444" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>


                        {{-- Menu --}}
                        <div class="dropdown" style="margin-left: auto;">
                            {{-- <div style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                    height="18" fill="currentColor">
                                    <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
                                </svg>
                            </div> --}}
                            <a class="btn dropdown-toggle pb-1" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false" style="width: 60px; height:35px">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="auto" fill="currentColor">
                                    <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
                                </svg>
                            </a>

                            <!-- Dropdown Menu -->
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="{{ route('display.product.history.owner') }}">Product
                                        History</a></li>
                                <li><a class="dropdown-item" href="{{ route('display.edit.history') }}">Edit History</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Table --}}
                    <table id="product-list-table" class="table table-bordered mt-3">
                        {{-- style="width:97%; overflow: hidden; border: 1px solid #dee2e6; border-radius:7px" --}}
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
                                <th scope="col" style="border: 1px solid #dee2e6; ; width:35px">
                                </th>
                            </tr>
                        </thead>
                        {{-- Display product list --}}
                        <tbody>
                            @foreach ($products as $product)
                                @if ($product->productQuantity > $product->stockAlert)
                                <tr>
                                    <th scope="row" style="border: 1px solid #dee2e6;">{{ $loop->iteration }}</th>
                                    <td style="border: 1px solid #dee2e6;">{{ $product->productName }}</td>
                                    <td style="border: 1px solid #dee2e6;">{{ $product->productCost }}</td>
                                    <td style="border: 1px solid #dee2e6;">{{ $product->productSell }}</td>
                                    <td style="border: 1px solid #dee2e6;">{{ $product->category->categoryName }}</td>
                                    <td style="border: 1px solid #dee2e6;">
                                        {{ \Carbon\Carbon::parse($product->productExpired)->format('d-m-Y') }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6;">
                                        @if ($product->productQuantity > $product->stockAlert)
                                            <span>{{ $product->productQuantity }}</span>
                                        @else
                                            <span style="color: red">{{ $product->productQuantity }}</span>
                                        @endif
                                    </td>
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
                                @else
                                <tr>
                                    <th scope="row" style="border: 1px solid #dee2e6; background-color: rgb(255, 226, 226)" >{{ $loop->iteration }}</th>
                                    <td style="border: 1px solid #dee2e6; background-color: rgb(255, 226, 226)">{{ $product->productName }}</td>
                                    <td style="border: 1px solid #dee2e6; background-color: rgb(255, 226, 226)">{{ $product->productCost }}</td>
                                    <td style="border: 1px solid #dee2e6; background-color: rgb(255, 226, 226)">{{ $product->productSell }}</td>
                                    <td style="border: 1px solid #dee2e6; background-color: rgb(255, 226, 226)">{{ $product->category->categoryName }}</td>
                                    <td style="border: 1px solid #dee2e6; background-color: rgb(255, 226, 226)">
                                        {{ \Carbon\Carbon::parse($product->productExpired)->format('d-m-Y') }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; background-color: rgb(255, 226, 226)">
                                        @if ($product->productQuantity > $product->stockAlert)
                                            <span>{{ $product->productQuantity }}</span>
                                        @else
                                            <span style="color: rgb(221, 0, 0)">{{ $product->productQuantity }}</span>
                                        @endif
                                    </td>
                                    <td style="border: 1px solid #dee2e6; background-color: rgb(255, 226, 226)">
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
                                @endif
                                
                            @endforeach

                        </tbody>
                    </table>
                    <div id="paginate" class="d-flex justify-content-center" class="">{{ $products->links() }}
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

<style>
    #product-list-table th {
        color: #9f9f9f;
    }
</style>
