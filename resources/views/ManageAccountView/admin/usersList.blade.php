@extends('layouts.adminNav')

@section('content')
    <div class="container" style="width: 85%; margin-left: 15%">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('destroy'))
            <div class="alert alert-danger">
                {{ session('destroy') }}
            </div>
        @endif

        {{-- Content --}}
        <div class="row justify-content-center " style="width: 100%; height:auto; margin-left:0px">
            <div class="d-flex justify-content-between align-items-center w-100 my-4">
                <h3 class="" style="">Users List</h3>
            </div>

            {{-- Company info Table --}}
            <div class="w-100 mb-4">
                <table class="table table-bordered" style="width: 100%; border:1px solid rgb(192, 192, 192)">
                    <tbody>
                        @foreach ($company as $company)
                            <tr>
                                <th style="color: rgb(65, 65, 65); width: 25%">Company</th>
                                <td>{{ $company->companyName }}</td>
                            </tr>
                            <tr>
                                <th style="color: rgb(65, 65, 65); width: 25%">Email</th>
                                <td>{{ $company->companyEmail }}</td>
                            </tr>
                            <tr>
                                <th style="color: rgb(65, 65, 65); width: 25%">Phone Number</th>
                                <td>{{ $company->companyPhone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Register User button --}}
            <div class="d-flex justify-content-end mb-3 w-100">
                <a href="{{ route('create.register') }}">
                    <button class="btn btn-dark" style="width:150px; height:35px; border-radius:5px;">
                        Register
                    </button>
                </a>
            </div>


            {{-- List of Users Table --}}
            <div class="w-100">
                <table class="table table-striped" style="width: 100%; border: 1px solid rgb(214, 214, 214)">
                    <thead>
                        <tr>
                            <th scope="col" style="background-color: rgb(28, 28, 207); color:white;">No.</th>
                            <th scope="col" style="background-color: rgb(28, 28, 207); color:white;">Name</th>
                            <th scope="col" style="background-color: rgb(28, 28, 207); color:white;">Email</th>
                            <th scope="col" style="background-color: rgb(28, 28, 207); color:white;">ID</th>
                            <th scope="col" style="background-color: rgb(28, 28, 207); color:white;">Phone</th>
                            <th scope="col" style="background-color: rgb(28, 28, 207); color:white;">Role</th>
                            <th scope="col" style="background-color: rgb(28, 28, 207); color:white;">Photo</th>
                            <th scope="col" style="background-color: rgb(28, 28, 207); color:white;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->staffId }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->type }}</td>
                                <td>
                                    <div id="photo">
                                        <div
                                            style="width: 80px; height: 90px; background-size: cover; background-position: center; @if ($user->photo) background-image:url('{{ asset('uploads/' . $user->photo) }}'); @endif">
                                        </div>
                                    </div>
                                </td>
                                <td style="width: 130px;">
                                    {{-- Edit Button --}}
                                    <button class="me-2 btn btn-light">
                                        <a href="{{ url('admin/edit/' . $user->id . '/user/account') }}">
                                            <svg style="color: rgb(68, 68, 68)" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" width="20" height="auto" fill="currentColor">
                                                <path
                                                    d="M16.7574 2.99677L14.7574 4.99677H5V18.9968H19V9.23941L21 7.23941V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99677C3 3.44448 3.44772 2.99677 4 2.99677H16.7574ZM20.4853 2.09727L21.8995 3.51149L12.7071 12.7039L11.2954 12.7063L11.2929 11.2897L20.4853 2.09727Z">
                                                </path>
                                            </svg>
                                        </a>
                                    </button>


                                    {{-- Delete Button --}}
                                    @if ($user->type == 'owner' || $user->type == 'staff')
                                        <button class="btn btn-light">
                                            <a href="{{ url('admin/delete/' . $user->id . '/user') }}">
                                                <svg style="color: rgb(68, 68, 68);" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" width="20" height="auto" fill="currentColor">
                                                    <path
                                                        d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </button>
                                    @endif

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">No users found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        th {
            font-weight: 500;
        }
    </style>
@endsection
