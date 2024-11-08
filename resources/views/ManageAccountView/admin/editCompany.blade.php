@extends('layouts.adminNav')

@section('content')
    <div style="width: 85%; height:auto; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto">
            {{-- Content --}}
            <div style="width:70%; height:auto">
                <h3 class="mt-4">Edit Company</h3>
                <div class="card my-4" style="width: 100%">
                    <div class="card-body">
                        <div class="card-header">
                            <span>Company Information</span>
                        </div>
                        <form action="{{ url('admin/update/' . $company->id . '/company') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- Edit Company Form --}}
                            <div class="card-body">
                                {{-- Logo --}}
                                <div class="row mb-3">
                                    <label for="companyLogo"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Company Logo') }}</label>
                                    <div class="col-md-6">
                                        {{-- Display Current Logo --}}
                                        @if ($company->companyLogo)
                                            <img src="{{ asset('company/' . $company->companyLogo) }}" alt=""
                                                style="width: 200px; height:200px">
                                        @else
                                            <p>No Logo Available</p>
                                        @endif

                                        <input id="logo" type="file"
                                            class="form-control @error('companyLogo') is-invalid @enderror"
                                            name="companyLogo" accept=".png, .jpg, .jpeg">

                                        @error('companyLogo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Company Name --}}
                                <div class="row mb-3">
                                    <label for="companyName"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="companyName" type="text"
                                            class="form-control @error('companyName') is-invalid @enderror"
                                            name="companyName" value="{{ $company->companyName }}" required>

                                        @error('companyName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Company Address --}}
                                <div class="row mb-3">
                                    <label for="companyAddress"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                    <div class="col-md-6">
                                        <input id="companyAddress" type="text"
                                            class="form-control @error('companyAddress') is-invalid @enderror"
                                            name="companyAddress" value="{{ $company->companyAddress }}" required>

                                        @error('companyAddress')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Company Email --}}
                                <div class="row mb-3">
                                    <label for="companyEmail"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                                    <div class="col-md-6">
                                        <input id="companyEmail" type="email"
                                            class="form-control @error('companyEmail') is-invalid @enderror"
                                            name="companyEmail" value="{{ $company->companyEmail }}" required>

                                        @error('companyEmail')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Company Phone --}}
                                <div class="row mb-3">
                                    <label for="companyPhone"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Contact') }}</label>
                                    <div class="col-md-6">
                                        <input id="companyPhone" type="text"
                                            class="form-control @error('companyPhone') is-invalid @enderror"
                                            name="companyPhone" value="{{ $company->companyPhone }}" required>

                                        @error('companyPhone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Company Type --}}
                                <div class="row mb-3">
                                    <label for="companyType"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Business Type') }}</label>
                                    <div class="col-md-6">
                                        <input id="companyType" type="text"
                                            class="form-control @error('companyType') is-invalid @enderror"
                                            name="companyType" value="{{ $company->companyType }}" required>

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
                                        class="col-md-4 col-form-label text-md-end">{{ __('Registration No.') }}</label>
                                    <div class="col-md-6">
                                        <input id="registrationNo" type="text"
                                            class="form-control @error('registrationNo') is-invalid @enderror"
                                            name="registrationNo" value="{{ $company->registrationNo }}" required>

                                        @error('registrationNo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Company SSM --}}
                                <div class="row mb-3">
                                    <label for="companySsm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Company SSM') }}</label>
                                    <div class="col-md-6">
                                        @if ($company->companySsm)
                                            <a href="{{ asset('uploads/' . $company->companySsm) }}" target="_blank">View
                                                Current SSM</a>
                                        @else
                                            <p>No SSM Available</p>
                                        @endif
                                        <input id="companySsm" type="file"
                                            class="form-control @error('companySsm') is-invalid @enderror"
                                            name="companySsm" accept=".pdf">

                                        @error('companySsm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- SSM Certificate --}}
                                <div class="row mb-5">
                                    <label for="ssmCert"
                                        class="col-md-4 col-form-label text-md-end">{{ __('SSM Certificate') }}</label>
                                    <div class="col-md-6">
                                        @if ($company->ssmCert)
                                            <a href="{{ asset('company/' . $company->ssmCert) }}" target="_blank">View
                                                Current Certificate</a>
                                        @else
                                            <p>No Certificate Available</p>
                                        @endif
                                        <input id="ssmCert" type="file"
                                            class="form-control @error('ssmCert') is-invalid @enderror" name="ssmCert"
                                            accept=".pdf">

                                        @error('ssmCert')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                {{-- Submit Button --}}
                                <div class="d-flex justify-content-end" style="width: 83%;">
                                    <button id="btn-submit" type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
