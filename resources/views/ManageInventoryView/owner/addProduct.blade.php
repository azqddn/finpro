@extends('layouts.ownerNav')

@section('content')
    <div class="" style="width:85%; height:auto; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto; position:relative">
            {{-- Content --}}
            <div class="mt-4 row justify-content-center" style="width:70%; height:auto">
                <h3>Add Product</h3>
                <div class="card my-4">
                    <div class="card-body">
                        <div class="card-header">{{ __('Product Information') }}</div>

                        {{-- Product info --}}
                        <form action="{{ url('owner/store/product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Product Name --}}
                            <div class="row my-3">
                                <label for=""
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name :') }}</label>

                                <div class="col-md-6">
                                    <input id="productName" type="text"
                                        class="form-control @error('productName') is-invalid @enderror" name="productName"
                                        value="" required>

                                    @error('productName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Category --}}
                            <div class="row my-3">
                                <label for=""
                                    class="col-md-4 col-form-label text-md-end">{{ __('Category :') }}</label>
                                <div class="col-md-6">
                                    <select name="categoryId" id="categoryId" class="form-control">
                                        @foreach ($category as $category)
                                            <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
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
                                        value="" required step="0.01" min="0">

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
                                        value="" required step="0.01" min="0">

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
                                        name="productQuantity" value="" required>

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
                                        value="" required>

                                    @error('stockAlert')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Expired Date --}}
                            <div class="row my-3">
                                <label for=""
                                    class="col-md-4 col-form-label text-md-end">{{ __('Expired Date :') }}</label>

                                <div class="col-md-6">
                                    <input id="productExpired" type="date"
                                        class="form-control @error('productExpired') is-invalid @enderror"
                                        name="productExpired" value="" required>

                                    @error('productExpired')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Expired Date Alert --}}
                            <div class="row my-3">
                                <label for=""
                                    class="col-md-4 col-form-label text-md-end">{{ __('Expired Date Alert :') }}</label>

                                <div class="col-md-6">
                                    <input id="expiredAlert" type="date"
                                        class="form-control @error('expiredAlert') is-invalid @enderror" name="expiredAlert"
                                        value="" required>

                                    @error('expiredAlert')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Proof --}}
                            <div class="row my-3">
                                <label for=""
                                    class="col-md-4 col-form-label text-md-end">{{ __('Proof') }}</label>

                                <div class="col-md-6">
                                    <input id="productProof" type="file"
                                        class="form-control @error('productProof') is-invalid @enderror"
                                        name="productProof" value="" required accept=".png, .jpg, .jpeg .pdf">

                                    @error('productProof')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="d-flex justify-content-end" style="width: 83%">
                                <button type="submit"
                                style="width: 85px;height:35px; background-color:rgb(4, 0, 255); border:1px solid rgb(4, 0, 255); border-radius:5px; color:white">
                                {{ __('Submit') }}
                            </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
