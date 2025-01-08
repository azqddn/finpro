@extends('layouts.staffNav')

@section('content')
    <div class="" style="width:85%; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto">
            <div class="row justify-content-center" style="width: 70%">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <h3 class="mt-4">Company Info</h3>

                <div class="mt-3 mb-3 row justify-content-center"
                    style="background-color:rgb(255, 255, 255);border:1px solid rgb(185, 185, 185); box-shadow: 2px 3px 6px #4b4b4b42; border-radius:10px; width:100%; height:auto">
                    @foreach ($company as $company)
                        {{-- Logo --}}
                        <div id="top-profile" class="d-flex justify-content-between align-items-start my-4"
                            style="width:90%; height:auto;">
                            <div class="d-flex align-items-center">
                                <!-- Logo -->
                                <div id="logo" class="me-3"
                                    style="width: 140px; height: 140px;border:1px solid rgb(161, 161, 161); background-size: cover; background-position: center;
                                    @if ($company->companyLogo) background-image:url('{{ asset('company/' . $company->companyLogo) }}'); @endif">
                                </div>

                                <!-- Company Name -->
                                <div class="align-self-center">
                                    <h3 style="color: rgb(3, 3, 207)">{{ $company->companyName }}</h3>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div id="bottom-profile" class="mt-4" style="width:90%; height:auto">
                            {{-- Address --}}
                            <div class="row mb-3">
                                <label for="companyAddress"
                                    class="col-md-3 col-form-label text-md-start">{{ __('Company Address') }}</label>

                                <div class="col-md-9">
                                    <input id="companyAddress" type="text" style="background-color: #e5e9ff"
                                        class="form-control @error('companyAddress') is-invalid @enderror"
                                        name="companyAddress" value="{{ $company->companyAddress }}" readonly>
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="row mb-3">
                                <label for="companyPhone"
                                    class="col-md-3 col-form-label text-md-start">{{ __('Company Phone') }}</label>

                                <div class="col-md-9">
                                    <input id="companyPhone" type="text" style="background-color: #e5e9ff"
                                        class="form-control @error('companyPhone') is-invalid @enderror" name="companyPhone"
                                        value="{{ $company->companyPhone }}" readonly>

                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="row mb-3">
                                <label for="companyEmail"
                                    class="col-md-3 col-form-label text-md-start">{{ __('Email') }}</label>

                                <div class="col-md-9">
                                    <input id="companyEmail" type="text" style="background-color: #e5e9ff"
                                        class="form-control @error('companyEmail') is-invalid @enderror" name="companyEmail"
                                        value="{{ $company->companyEmail }}" readonly>

                                    @error('companyEmail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Company Type --}}
                            <div class="row mb-3">
                                <label for="companyType"
                                    class="col-md-3 col-form-label text-md-start">{{ __('Business Type') }}</label>

                                <div class="col-md-9">
                                    <input id="companyType" type="text" style="background-color: #e5e9ff"
                                        class="form-control @error('companyType') is-invalid @enderror" name="companyType"
                                        value="{{ $company->companyType }}" readonly>

                                    @error('companyType')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Registration Number --}}
                            <div class="row mb-3">
                                <label for="registrationNo"
                                    class="col-md-3 col-form-label text-md-start">{{ __('Registration Number') }}</label>

                                <div class="col-md-9">
                                    <input id="registrationNo" type="text" style="background-color: #e5e9ff"
                                        class="form-control @error('registrationNo') is-invalid @enderror"
                                        name="registrationNo" value="{{ $company->registrationNo }}" readonly>

                                    @error('registrationNo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Company SSM --}}
                            <div class="row mb-3">
                                <label style="margin-right: 12px" for="companySsm"
                                    class="col-md-3 col-form-label text-md-start">{{ __('Company SSM') }}</label>

                                <div class="col-md-9 align-content-center"
                                    style="background-color: #e5e9ff; border:1px rgb(224, 224, 224) solid; border-radius:7px; width:72%">
                                    @if ($company->companySsm)
                                        <a href="{{ asset('company/' . $company->companySsm) }}" target="_blank">
                                            Company SSM
                                        </a>
                                    @else
                                        <p>No SSM Cert available.</p>
                                    @endif
                                </div>
                            </div>
                            {{-- SSM Certificate --}}
                            <div class="row mb-5">
                                <label style="margin-right: 12px" for="ssmCert"
                                    class="col-md-3 col-form-label text-md-start">{{ __('SSM Certificate') }}</label>

                                <div class="col-md-9 align-content-center"
                                    style="background-color: #e5e9ff; border:1px rgb(224, 224, 224) solid; border-radius:7px; width:72%">
                                    @if ($company->ssmCert)
                                        <a href="{{ asset('company/' . $company->ssmCert) }}" target="_blank">
                                            SSM Cert
                                        </a>
                                    @else
                                        <p>No SSM Cert available.</p>
                                    @endif
                                </div>
                            </div>


                        </div>
                    @endforeach
                </div>

                {{-- Edit Company Button --}}
                <div class="d-flex justify-content-end">
                    {{-- <a href="{{ url('admin/edit/' . $company->id . '/company') }}">
                        <button class="btn btn-dark">Edit</button>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
    <style>
        th {
            font-weight: 600;
        }
    </style>
@endsection
