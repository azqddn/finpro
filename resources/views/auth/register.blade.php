@extends('layouts.adminNav')

@section('content')
    <div class="" style="width: 85%; margin-left:15%; height:auto; float:left">
        <div class="row justify-content-center" style="width: 100%; height:auto">
            <div class="col-md-8">
                <h3 class="mt-4">User Registration</h3>
                <div class="card mt-5 mb-5">
                    <form method="POST" action="{{ route('store.register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="card-body">
                                <div class="card-header">{{ __('Account') }}</div>
                            </div>

                            {{-- Account Form --}}
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        {{-- Staff Inforamtion Form --}}

                        <div class="card-body">
                            <div class="card-header">{{ __('User Information') }}</div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address" required
                                    autocomplete="address" autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ic"
                                class="col-md-4 col-form-label text-md-end">{{ __('Identity Card') }}</label>
                            <div class="col-md-6">
                                <input id="ic" type="text" class="form-control @error('ic') is-invalid @enderror"
                                    name="ic" required autofocus>

                                @error('ic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone"
                                class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone" required
                                    autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                            <div class="col-md-6" style="padding-top: 7px">
                                <input id="role1" type="radio" name="type" value="1">
                                <label for="role1" class="me-5">Business Owner</label>
                                <input id="role2" type="radio" name="type" value="2">
                                <label for="role2" class="me-5">Staff</label>
                                {{-- <input id="role3" type="radio" name="type" value="0">
                                <label for="role3">Admin</label> --}}

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="staffId"
                                class="col-md-4 col-form-label text-md-end">{{ __('Staff ID') }}</label>
                            <div class="col-md-6">
                                <input id="staffId" type="text"
                                    class="form-control @error('staffId') is-invalid @enderror" name="staffId" required
                                    autofocus>

                                @error('staffId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="staffId"
                                class="col-md-4 col-form-label text-md-end">{{ __('Profile Photo') }}</label>
                            <div class="col-md-6">
                                <input id="photo" type="file"
                                    class="form-control @error('photo') is-invalid @enderror" name="photo" required
                                    accept=".png, .jpg, .jpeg">

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
@endsection
