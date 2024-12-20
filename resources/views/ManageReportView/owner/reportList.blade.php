@extends('layouts.ownerNav')

@section('content')
    <div style="width: 85%; height:auto; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto">
            {{-- Content --}}
            <div class="mt-4 me-3 row justify-content-center" style="width:95%; height:auto; margin-left:20px">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('destroy'))
                    <div class="alert alert-danger">
                        {{ session('destroy') }}
                    </div>
                @endif
                <h3 class="mb-4" style="color: rgb(0, 0, 216)">
                    Report
                </h3>

                {{-- Main 1 --}}
                <div class="row justify-content-center"
                    style="width: 100%; height:auto; background-color:white; border-radius:20px; box-shadow: 2px 3px 6px #4b4b4b42;">
                    {{-- Top --}}
                    <div class="d-flex justify-content-between align-items-center pt-4 my-3">

                        {{-- Filter/Sort --}}
                        <div class="dropdown" style="margin-left: auto; margin-right: 0px;">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <svg width="25" height="auto" viewBox="0 0 16 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.75 2.25H1.25C1.05109 2.25 0.860322 2.17098 0.71967 2.03033C0.579018 1.88968 0.5 1.69891 0.5 1.5C0.5 1.30109 0.579018 1.11032 0.71967 0.96967C0.860322 0.829018 1.05109 0.75 1.25 0.75H14.75C14.9489 0.75 15.1397 0.829018 15.2803 0.96967C15.421 1.11032 15.5 1.30109 15.5 1.5C15.5 1.69891 15.421 1.88968 15.2803 2.03033C15.1397 2.17098 14.9489 2.25 14.75 2.25ZM12.25 5.75H3.75C3.55109 5.75 3.36032 5.67098 3.21967 5.53033C3.07902 5.38968 3 5.19891 3 5C3 4.80109 3.07902 4.61032 3.21967 4.46967C3.36032 4.32902 3.55109 4.25 3.75 4.25H12.25C12.4489 4.25 12.6397 4.32902 12.7803 4.46967C12.921 4.61032 13 4.80109 13 5C13 5.19891 12.921 5.38968 12.7803 5.53033C12.6397 5.67098 12.4489 5.75 12.25 5.75ZM9.25 9.25H6.75C6.55109 9.25 6.36032 9.17098 6.21967 9.03033C6.07902 8.88968 6 8.69891 6 8.5C6 8.30109 6.07902 8.11032 6.21967 7.96967C6.36032 7.82902 6.55109 7.75 6.75 7.75H9.25C9.44891 7.75 9.63968 7.82902 9.78033 7.96967C9.92098 8.11032 10 8.30109 10 8.5C10 8.69891 9.92098 8.88968 9.78033 9.03033C9.63968 9.17098 9.44891 9.25 9.25 9.25Z"
                                        fill="#292929" />
                                </svg>
                            </a>

                            <!-- Dropdown Menu -->
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item active" href="?sort=oldest">Oldest First</a></li>
                                <li><a class="dropdown-item" href="#">Revenue</a></li>
                                <li><a class="dropdown-item" href="#">Expenses</a></li>
                                <li><a class="dropdown-item" href="#">Balance</a></li>
                            </ul>
                        </div>

                        {{-- Search Div --}}
                        <div class="d-flex justify-content-center" style="flex: 1; ">
                            <div class="d-flex align-items-center px-2"
                                style="border: 1px solid rgb(134, 134, 134); border-radius:10px; width:400px; height:35px; box-shadow: 1px 1px 10px #00000042;">
                                {{-- Seach Input --}}
                                <form action="#" method="GET"
                                    class="d-flex justify-content-between align-items-center"
                                    style="width:100%; border-radius:10px">
                                    <input type="text" placeholder="Search" name="search" value=""
                                        style="border: none; outline: none; color:rgb(61, 61, 61); width:100%" />
                                    <button type="submit"
                                        style="border: none; outline: none; background-color:transparent">
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

                        {{-- Create new report --}}
                        <div id="addRecordButtonWrapper"
                            style="">
                            <a href="{{route('owner.report.create')}}" id="addRecordButton" style="text-decoration: none;">
                                <button data-bs-toggle="modal" data-bs-target="#addRecordModal"
                                    style="width: 60px;height:30px; background-color:rgb(47, 47, 47); border:1px solid rgb(186, 186, 186); border-radius:10px; color:white; box-shadow: 2px 2px 3px #00000042;">
                                    {{ __('+') }}
                                </button>
                            </a>
                        </div>
                    </div>

                    {{-- Table content --}}
                    <div class="my-4" style="border: 1px solid black">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">sa</th>
                                    <th scope="col">sa</th>
                                    <th scope="col">sa</th>
                                    <th scope="col">sa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">aa</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

