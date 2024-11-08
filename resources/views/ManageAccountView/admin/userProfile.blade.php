@extends('layouts.adminNav')

@section('content')
    <div class="" style="width:85%; height:auto; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto; position:relative">
            {{-- Content --}}
            <div class="mt-4 row justify-content-center" style="width:70%; height:auto">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }};
                    </div>
                @elseif (session('destroy'))
                    <div class="alert alert-danger">
                        {{ session('destroy') }};
                    </div>
                @endif
                <h3 style="color: rgb(0, 0, 216)">User Profile</h3>
                <div class="mt-3 mb-4 row justify-content-center"
                    style="background-color:rgb(255, 255, 255);border:1px solid rgb(185, 185, 185); box-shadow: 7px 7px 5px rgb(206, 222, 255); border-radius:10px; width:100%; height:auto">
                    {{-- Photo --}}
                    <div id="photo" class="rounded-circle my-3 row justify-content-center"
                        style="width: 140px; height: 140px;border:1px solid rgb(78, 78, 78); background-size: cover; background-position: center; 
                        @if ($user->photo) background-image:url('{{ asset('uploads/' . $user->photo) }}'); @endif">
                    </div>

                    <hr class="mt-2 mb-4">

                    {{-- User Information --}}
                    <div>
                        {{-- Name --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-3 col-form-label text-md-start">{{ __('Name') }}</label>
                            <div class="col-md-9">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $user->name }}" disabled>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Role --}}
                        <div class="row mb-3">
                            <label for="type" class="col-md-3 col-form-label text-md-start">{{ __('Role') }}</label>
                            <div class="col-md-9">
                                <input id="type" type="text"
                                    class="form-control @error('type') is-invalid @enderror" name="type"
                                    value="{{ $user->type }}" disabled>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Staff ID --}}
                        <div class="row mb-3">
                            <label for="staffId" class="col-md-3 col-form-label text-md-start">{{ __('Staff ID') }}</label>
                            <div class="col-md-9">
                                <input id="staffId" type="text"
                                    class="form-control @error('staffId') is-invalid @enderror" name="staffId"
                                    value="{{ $user->staffId }}" disabled>

                                @error('staffId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Address --}}
                        <div class="row mb-3">
                            <label for="address" class="col-md-3 col-form-label text-md-start">{{ __('Address') }}</label>
                            <div class="col-md-9">
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ $user->address }}" disabled>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- NRIC --}}
                        <div class="row mb-3">
                            <label for="ic" class="col-md-3 col-form-label text-md-start">{{ __('IC') }}</label>
                            <div class="col-md-9">
                                <input id="ic" type="text" class="form-control @error('ic') is-invalid @enderror"
                                    name="ic" value="{{ $user->ic }}" disabled>

                                @error('ic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Phone --}}
                        <div class="row mb-3">
                            <label for="phone" class="col-md-3 col-form-label text-md-start">{{ __('Phone') }}</label>
                            <div class="col-md-9">
                                <input id="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ $user->phone }}" disabled>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Email --}}
                        <div class="row mb-3">
                            <label for="email" class="col-md-3 col-form-label text-md-start">{{ __('Email') }}</label>
                            <div class="col-md-9">
                                <input id="email" type="text"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $user->email }}" disabled>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Change Password --}}
                    <div class="row mb-4">
                        <div class="col-md-8 offset-md-4 justify-content-end d-flex">
                            <a href="{{ url('admin/change/' . $user->id . '/password') }}"><button type="submit"
                                    style="width: 150px;height:35px; background-color:rgb(28, 28, 255); border:1px solid rgb(28, 28, 255); border-radius:5px; color:white">
                                    {{ __('Change Password') }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
