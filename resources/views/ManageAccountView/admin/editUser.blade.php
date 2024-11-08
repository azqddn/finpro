@extends('layouts.adminNav')

@section('content')
    <div class="container" style="width:85%; margin-left:15%"> 
        <div class="row justify-content-center" >
            <div class="justify-content-center" style="width: 70%">
                
                <h3 class="my-4">Edit User</h3>
                <div class="card mb-5">
                    <form method="POST" action="{{ url('admin/update/' . $user->id . '/user/account') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="card-header">{{ __('Account') }}</div>

                            {{-- Account Form --}}
                            <div class="row my-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $user->email }}" disabled>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        value=""required>

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
                                    <input id="password-confirm" type="password" class="form-control" value=""
                                        name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" style="width: 85px;height:35px; background-color:rgb(28, 28, 255); border:1px solid rgb(28, 28, 255); border-radius:5px; color:white">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    {{-- Staff Inforamtion Form --}}

                    <form method="POST" action="{{ url('admin/update/' . $user->id . '/user/information') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="card-header">{{ __('Staff Information') }}</div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $user->name }}" required autocomplete="name" autofocus>

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
                                    value="{{ $user->address }}" autocomplete="address" autofocus>
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
                                    value="{{ $user->ic }}"name="ic" required autofocus>

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
                                    value="{{ $user->phone }}" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if ($user->type == 'owner' || $user->type == 'staff')
                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Role (1 : owner / 2 : staff)') }}</label>
                            <div class="col-md-6">
                                <input id="type" type="number" class="form-control @error('type') is-invalid @enderror" name="type" required
                                    value="{{ $user->type == 'owner' ? 1 : ($user->type == 'staff' ? 2 : '') }}" autofocus>
                        
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @else
                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Role (0 : Admin)') }}</label>
                            <div class="col-md-6">
                                <input id="type" type="number" class="form-control @error('type') is-invalid @enderror" name="type" required
                                    value="{{ $user->type == 'admin' ? 0 : ''}}" autofocus readonly>
                        
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif

                        <div class="row mb-3">
                            <label for="staffId"
                                class="col-md-4 col-form-label text-md-end">{{ __('Staff ID') }}</label>
                            <div class="col-md-6">
                                <input id="staffId" type="text"
                                    class="form-control @error('staffId') is-invalid @enderror" name="staffId" required
                                    value="{{ $user->staffId }}" autofocus>

                                @error('staffId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="staffId" class="col-md-4 col-form-label text-md-end">{{ __('Profile Photo') }}</label>
                            <div class="col-md-6">
                                <!-- Display current user's photo -->
                                @if($user->photo)
                                    <img src="{{ asset('uploads/' . $user->photo) }}" alt="Profile Photo" class="img-thumbnail mb-3" style="width: 120px; height: auto;">
                                @else
                                    <p>No photo available</p>
                                @endif
                        
                                <!-- File input for uploading a new photo -->
                                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" accept=".png, .jpg, .jpeg">
                        
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" style="width: 85px;height:35px; background-color:rgb(28, 28, 255); border:1px solid rgb(28, 28, 255); border-radius:5px; color:white">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection
