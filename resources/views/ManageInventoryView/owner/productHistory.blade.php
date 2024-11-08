@extends('layouts.ownerNav')

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
                <h3 class="my-4">Product History</h3>
                {{-- Main --}}
                <div class="row justify-content-center mb-5"
                    style="width: 100%; height:auto; background-color:rgb(255, 255, 255); border-radius:10px; box-shadow: 2px 3px 6px #0213ff42;">
                    Buat Search Function
                    {{-- Search --}}
                    <div class="row justify-content-center my-3" style="">
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

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">No</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Product</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911); width:70px">Status</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Proof</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Price (RM)</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Expired</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Created By</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Create Date</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Remove Date</th>
                                <th scope="col" style="width: 30px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $product)
                                <tr style="height: 40px">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $product->productName }}</td>
                                    <td class="row justify-content-center align-items-center">
                                        @if ($product->productStatus == '0')
                                            <div class="d-flex justify-content-center align-items-center py-1"
                                                style="background-color: red; color:white; border-radius:15px; width:90%;">
                                                <h6 class="m-0"><strong>removed</strong></h6>
                                            </div>
                                        @elseif ($product->productStatus == '1')
                                            <div class="d-flex justify-content-center align-items-center py-1"
                                                style="background-color: rgb(0, 81, 255); color:white; border-radius:15px; width:90%;">
                                                <h6 class="m-0"><strong>listed</strong></h6>
                                            </div>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <div>
                                            @if ($product->productProof)
                                                <a href="{{ asset('product/' . $product->productProof) }}" target="_blank">
                                                    Proof {{ $product->productName }}
                                                </a>
                                            @else
                                                <p>No proof available.</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $product->productSell }}</td>
                                    <td>{{ \Carbon\Carbon::parse($product->productExpired)->format('Y-m-d') }}</td>
                                    <td>{{ $product->user->name }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        {{-- Show the remove date for the removed product only --}}
                                        @if ($product->productStatus == '0')
                                            {{ $product->updated_at }}
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Only the removed product can be deleted --}}
                                        @if ($product->productStatus == '0')
                                            <a href="{{ url('owner/destroy/' . $product->id . '/product') }}">
                                                <svg style="color: rgba(0, 0, 0, 0.692)"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="21"
                                                    height="21" fill="currentColor">
                                                    <path
                                                        d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
