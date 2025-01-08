@extends('layouts.staffNav')

@section('content')
    <div class="" style="width:85%; height:auto; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto; position:relative">
            {{-- Content --}}
            <div class="mt-4 row justify-content-center" style="width:95%; height:auto">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }};
                    </div>
                @elseif (session('destroy'))
                    <div class="alert alert-danger">
                        {{ session('destroy') }};
                    </div>
                @endif
                <h3 class="mb-4">Product History</h3>
                {{-- Main --}}
                <div class="row justify-content-center mb-5"
                    style="width: 100%; height:auto; background-color:rgb(255, 255, 255); border-radius:10px; box-shadow: 2px 3px 6px #4b4b4b42;">

                    {{-- Top --}}
                    <div class="d-flex justify-content-between align-items-center pe-0" style="">
                        {{-- Search --}}
                        <div class="row justify-content-center my-4" style="flex-grow: 1;">
                            <div class="d-flex align-items-center pt-3 ps-2 pe-2"
                                style="border: 1px solid rgb(134, 134, 134); border-radius:10px; width:400px; height:35px; box-shadow: 1px 1px 10px #00000042;">
                                <form action="{{ route('display.product.history.staff') }}" method="GET"
                                    class="d-flex justify-content-between align-items-center"
                                    style="width:100%; border-radius:10px">
                                    <input type="text" placeholder="Search by Product Name" name="search" value=""
                                        style="border: none; outline: none; color:rgb(61, 61, 61); width:100%" />
                                    <button type="submit"
                                        style="border: none; outline: none; background-color:transparent">
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

                        {{-- Sorting --}}
                        <div class="dropdown me-1">
                            <div style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    fill="currentColor">
                                    <path d="M10 18H14V16H10V18ZM3 6V8H21V6H3ZM6 13H18V11H6V13Z"></path>
                                </svg>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="{{ route('display.product.history.staff', ['sort' => 'a_to_z']) }}">From A to Z</a></li>
                                <li><a class="dropdown-item" href="{{ route('display.product.history.staff', ['sort' => 'price_low_high']) }}">Price Low to High</a></li>
                                <li><a class="dropdown-item" href="{{ route('display.product.history.staff', ['sort' => 'price_high_low']) }}">Price High to Low</a></li>
                                <li><a class="dropdown-item" href="{{ route('display.product.history.staff', ['sort' => 'cost_low_high']) }}">Cost Low to High</a></li>
                                <li><a class="dropdown-item" href="{{ route('display.product.history.staff', ['sort' => 'cost_high_low']) }}">Cost High to Low</a></li>
                            </ul>
                        </div>
                    </div>

                    <table id="product-history-list" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Product</th>
                                <th scope="col">Proof</th>
                                <th scope="col">Cost (RM)</th>
                                <th scope="col">Price (RM)</th>
                                <th scope="col">Sold</th>
                                <th scope="col">Expired</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Create Date</th>
                                <th scope="col">Remove Date</th>
                                {{-- <th scope="col" style="width: 30px"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                                <tr style="height: 40px">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->productName }}</td>
                                    <td>
                                        <div class="text-center">
                                            @if ($item->productProof)
                                                <a href="{{ asset('product/' . $item->productProof) }}" target="_blank">
                                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            width="16" height="16" fill="currentColor">
                                                            <path
                                                                d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </a>
                                            @else
                                                <p>No proof available.</p>
                                            @endif
                                        </div>

                                    </td>
                                    <td>{{ $item->productCost }}</td>
                                    <td>{{ $item->productSell }}</td>
                                    <td>{{$item->transactions}}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->productExpired)->format('Y-m-d') }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        <span style="color: rgb(0, 0, 176);">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
                                        </span>
                                        <span style="color: rgb(0, 96, 0);">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('h:i A') }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($item->productStatus == '0')
                                            <span style="color: rgb(0, 0, 176);">
                                                {{ \Carbon\Carbon::parse($item->updated_at)->format('d-m-Y') }}
                                            </span>
                                            <span style="color: rgb(0, 96, 0);">
                                                {{ \Carbon\Carbon::parse($item->updated_at)->format('h:i A') }}
                                            </span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    {{-- <td>
                                        @if ($item->productStatus == '0')
                                            <a href="{{ url('owner/destroy/' . $item->id . '/product') }}">
                                                <svg style="color: rgba(0, 0, 0, 0.692)" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" width="21" height="21" fill="currentColor">
                                                    <path
                                                        d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endif
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div id="paginate" class="d-flex justify-content-center">{{ $product->appends(request()->query())->links() }}</div>


                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    #product-history-list th {
        color: #9f9f9f;
    }
</style>
