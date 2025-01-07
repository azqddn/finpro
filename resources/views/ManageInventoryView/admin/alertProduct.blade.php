@extends('layouts.ownerNav')

@section('content')
    <div style="width: 85%; height:auto; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto">
            {{-- Content --}}
            <div style="width:70%; height:auto; margin-left:20px">
                {{-- Title --}}
                <h3 class="my-4">
                    Alert Message
                </h3>
                {{-- Main --}}
                @foreach ($product as $product)
                    <div class="row justify-content-center py-2 mb-4"
                        style="width: 100%; height:auto; background-color:rgb(255, 255, 255); border-radius:10px; box-shadow: 2px 3px 6px #0213ff42;">
                        <div class="row justify-content-start align-items-center" style="">
                            <h5 style="color: rgb(75, 75, 75)"><strong>{{ $product->productName }}</strong></h5>
                            @if ($product->productQuantity == $product->stockAlert || $product->productQuantity < $product->stockAlert)
                                <div class="mb-3"
                                    style="background-color:rgb(0, 17, 255); width:270px; border-radius:15px">
                                    <span style="color:rgb(255, 255, 255)"><strong>Product low stock or out of stock!</strong></span>
                                </div>
                                <hr>
                                <span style="color: rgb(20, 35, 255)"><strong>Stock Left: {{ $product->productQuantity }}</strong></span>

                            @elseif (\Carbon\Carbon::now()->greaterThanOrEqualTo($product->expiredAlert))
                                <div class="mb-3"
                                    style="background-color:rgb(255, 39, 39); width:260px; border-radius:15px">
                                    <span style="color:rgb(255, 255, 255)"><strong>Product expired or nearing
                                            expiry!</strong></span>
                                </div>
                                <hr>
                                <span style="color: red"><strong>Expired:
                                        {{ \Carbon\Carbon::parse($product->productExpired)->format('d-m-Y') }}</strong></span>
                            @endif




                            <span>Category: {{ $product->category->categoryName }}</span>
                            <span>Cost (RM): {{ $product->productCost }}</span>
                            <span>Price (RM): {{ $product->productSell }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
