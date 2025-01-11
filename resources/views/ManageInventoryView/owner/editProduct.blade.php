@extends('layouts.ownerNav')

@section('content')
    <div class="" style="width:85%; height:auto; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto; position:relative">
            {{-- Content --}}
            <div class="mt-4 row justify-content-center" style="width:70%; height:auto">
                <h3 class="my-4" style="color: rgb(0, 0, 216)">Edit "{{ $product->productName }}" Information</h3>
                {{-- Main --}}
                <div style="width: 100%; height:auto; background-color:rgb(255, 255, 255); border-radius:10px; padding-top:15px">
                    <form action="{{url('/owner/update/' .$product->id. '/product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Product Name --}}
                        <div class="row my-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Name :') }}</label>

                            <div class="col-md-6">
                                <input id="productName" type="text"
                                    class="form-control @error('productName') is-invalid @enderror" name="productName"
                                    value="{{ $product->productName }}" required>

                                @error('productName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Category --}}
                        <div class="row my-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Category :') }}</label>

                            <div class="col-md-6">
                                <select name="categoryId" id="categoryId" class="form-control">
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $product->category->id ? 'selected' : '' }}>
                                            {{ $category->categoryName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Cost price --}}
                        <div class="row my-3">
                            <label for=""
                                class="col-md-4 col-form-label text-md-end">{{ __('Cost Price (RM) :') }}</label>

                            <div class="col-md-6">
                                <input id="productCost" type="text"
                                    class="form-control @error('productCost') is-invalid @enderror" name="productCost"
                                    value="{{ $product->productCost }}" required step="0.01" min="0">

                                @error('productCost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Sell price --}}
                        <div class="row my-3">
                            <label for=""
                                class="col-md-4 col-form-label text-md-end">{{ __('Sell Price (RM) :') }}</label>

                            <div class="col-md-6">
                                <input id="productSell" type="text"
                                    class="form-control @error('productSell') is-invalid @enderror" name="productSell"
                                    value="{{ $product->productSell }}" required step="0.01" min="0">

                                @error('productSell')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Quantity --}}
                        <div class="row my-3">
                            <label for=""
                                class="col-md-4 col-form-label text-md-end">{{ __('Quantity :') }}</label>

                            <div class="col-md-6">
                                <input id="productQuantity" type="text"
                                    class="form-control @error('productQuantity') is-invalid @enderror"
                                    name="productQuantity" value="{{ $product->productQuantity }}" required>

                                @error('productQuantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Low Quantity Alert --}}
                        <div class="row my-3">
                            <label for=""
                                class="col-md-4 col-form-label text-md-end">{{ __('Low Stock Alert :') }}</label>

                            <div class="col-md-6">
                                <input id="stockAlert" type="text"
                                    class="form-control @error('stockAlert') is-invalid @enderror" name="stockAlert"
                                    value="{{ $product->stockAlert }}" required>

                                @error('stockAlert')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Expired Date --}}
                        <div class="row my-3">
                            <label for="productExpired"
                                class="col-md-4 col-form-label text-md-end">{{ __('Expired Date :') }}</label>

                            <div class="col-md-6">
                                <input id="productExpired" type="date"
                                    class="form-control @error('productExpired') is-invalid @enderror" name="productExpired"
                                    value="{{ \Carbon\Carbon::parse($product->productExpired)->format('Y-m-d') }}"
                                    required>

                                @error('productExpired')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Expired Date Alert --}}
                        <div class="row my-3">
                            <label for="expiredAlert"
                                class="col-md-4 col-form-label text-md-end">{{ __('Expired Date Alert :') }}</label>

                            <div class="col-md-6">
                                <input id="expiredAlert" type="date"
                                    class="form-control @error('expiredAlert') is-invalid @enderror" name="expiredAlert"
                                    value="{{ \Carbon\Carbon::parse($product->expiredAlert)->format('Y-m-d') }}" required>

                                @error('expiredAlert')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- Reason --}}
                        <div class="row my-3">
                            <label for=""
                                class="col-md-4 col-form-label text-md-end">{{ __('Reason :') }}</label>

                            <div class="col-md-6">
                                <input id="reason" type="text"
                                    class="form-control @error('reason') is-invalid @enderror" name="reason"
                                    value="" required>

                                @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Proof --}}
                        <div class="row my-3">
                            <label for=""
                                class="col-md-4 col-form-label text-md-end">{{ __('Proof of Changes') }}</label>

                            <div class="col-md-6">
                                <input id="editProof" type="file"
                                    class="form-control @error('editProof') is-invalid @enderror" name="editProof"
                                    value="" accept=".png, .jpg, .jpeg .pdf" required>

                                @error('editProof')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- Submit Button --}}
                        <div class="d-flex justify-content-end my-4" style="width: 83%">
                            <button type="submit"
                                style="width: 85px;height:35px; background-color:rgb(4, 0, 255); border:1px solid rgb(4, 0, 255); border-radius:5px; color:white">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
