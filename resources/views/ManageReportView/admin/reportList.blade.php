@extends('layouts.adminNav')

@section('content')
    <div style="width: 85%; height:auto; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto">
            {{-- Content --}}
            <div class="mt-4 me-3 mb-5 row justify-content-center" style="width:70%; height:auto; margin-left:20px">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('destroy'))
                    <div class="alert alert-danger">
                        {{ session('destroy') }}
                    </div>
                @endif
                <h3 class="mb-4">
                    Report
                </h3>

                {{-- Main --}}
                <div class="mt-2 row justify-content-center align-items-center"
                    style="width: 100%; height:auto; background-color:white; border-radius:10px; box-shadow: 2px 3px 6px #4b4b4b42;">

                    {{-- Top --}}
                    <div class="my-3 mt-4 px-0 d-flex justify-content-between align-items-center" style="">

                        {{-- Dropdown --}}
                        <div class="dropdown " style="margin-left: auto; margin-right: 0px;">
                            <a class="btn dropdown-toggle pb-1" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false" style="width: 60px; height:35px">
                                <svg width="22" height="auto" viewBox="0 0 16 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.75 2.25H1.25C1.05109 2.25 0.860322 2.17098 0.71967 2.03033C0.579018 1.88968 0.5 1.69891 0.5 1.5C0.5 1.30109 0.579018 1.11032 0.71967 0.96967C0.860322 0.829018 1.05109 0.75 1.25 0.75H14.75C14.9489 0.75 15.1397 0.829018 15.2803 0.96967C15.421 1.11032 15.5 1.30109 15.5 1.5C15.5 1.69891 15.421 1.88968 15.2803 2.03033C15.1397 2.17098 14.9489 2.25 14.75 2.25ZM12.25 5.75H3.75C3.55109 5.75 3.36032 5.67098 3.21967 5.53033C3.07902 5.38968 3 5.19891 3 5C3 4.80109 3.07902 4.61032 3.21967 4.46967C3.36032 4.32902 3.55109 4.25 3.75 4.25H12.25C12.4489 4.25 12.6397 4.32902 12.7803 4.46967C12.921 4.61032 13 4.80109 13 5C13 5.19891 12.921 5.38968 12.7803 5.53033C12.6397 5.67098 12.4489 5.75 12.25 5.75ZM9.25 9.25H6.75C6.55109 9.25 6.36032 9.17098 6.21967 9.03033C6.07902 8.88968 6 8.69891 6 8.5C6 8.30109 6.07902 8.11032 6.21967 7.96967C6.36032 7.82902 6.55109 7.75 6.75 7.75H9.25C9.44891 7.75 9.63968 7.82902 9.78033 7.96967C9.92098 8.11032 10 8.30109 10 8.5C10 8.69891 9.92098 8.88968 9.78033 9.03033C9.63968 9.17098 9.44891 9.25 9.25 9.25Z"
                                        fill="#292929" />
                                </svg>
                            </a>

                            <!-- Dropdown Menu -->
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('admin.display.report', ['sort' => 'oldest_first']) }}">Oldest
                                        First</a>
                                        <a class="dropdown-item"
                                        href="{{ route('admin.display.report', ['sort' => 'latest_first']) }}">Latest
                                        First</a>
                                </li>
                            </ul>
                        </div>

                        {{-- Search --}}
                        <div class="mt-2 d-flex justify-content-center align-items-center ms-5"
                            style="width: 100%; margin-right: auto; margin-left:28px">
                            <div class="d-flex align-items-center pt-3 px-2"
                                style="border: 1px solid rgb(134, 134, 134); border-radius:10px; width:400px; height:35px; box-shadow: 1px 1px 10px #00000042;">
                                <form action="{{ route('admin.display.report') }}" method="GET"
                                    class="d-flex justify-content-between align-items-center"
                                    style="width:100%; border-radius:10px">
                                    <input type="text" placeholder="Search by Report Title" name="search" value=""
                                        style="border: none; outline: none; color:rgb(61, 61, 61); width:100%" />
                                    <button style="border: none; outline: none; background-color:transparent">
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
                        {{-- ----------- --}}

                        {{-- New Report Button --}}
                        <div>
                            <a href="{{ route('admin.report.create') }}" style="text-decoration: none;">
                                <button type="button" class="btn btn-light d-flex align-items-center"
                                    style="box-shadow: 2px 3px 6px #4b4b4b42; gap: 8px; width:170px">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                        height="16" fill="currentColor">
                                        <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                                    </svg>
                                    <span>Generate Report <span>
                                </button>
                            </a>
                        </div>
                        {{-- --------- --}}

                    </div>

                    <table id="report-list-table" class="table table-bordered m-4">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Report Title</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Generated by</th>
                                <th scope="col">Report</th>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($report->isNotEmpty())
                                @foreach ($report as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->reportTitle }}</td>

                                        {{-- Date Time --}}
                                        <td>
                                            <span style="color: rgb(0, 0, 176);">
                                                {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
                                            </span>
                                            <span style="color: rgb(0, 96, 0);">
                                                {{ \Carbon\Carbon::parse($item->created_at)->format('h:i A') }}
                                            </span>
                                        </td>
                                        {{-- -------- --}}

                                        <td>{{ $item->user->name }}</td>

                                        {{-- Report file --}}
                                        <td class="text-center">
                                            <a href="{{ asset('report/' . $item->reportFile) }}" target="_blank">
                                                <button type="button" class="btn btn-outline-primary btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        width="16" height="16" fill="currentColor">
                                                        <path
                                                            d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </a>
                                        </td>
                                        {{-- ---------- --}}

                                        {{-- Delete Button --}}
                                        <td>
                                            <a href="" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"
                                                onclick="populateModal({{ json_encode($item) }})">
                                                Delete
                                            </a>
                                        </td>
                                        {{-- ------ --}}

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="5">No Report Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div id="paginate" class="d-flex justify-content-center" class="">
                        {{ $report->appends(request()->query())->links() }}</div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- JS to  populate the modal with the clicked product's data. --}}
<script>
    function populateModal(item) {
        // Set the package name in the modal
        document.getElementById('reportTitle').textContent = item.reportTitle;

        // Update the delete form's action URL
        const deleteUrl = `{{ url('admin/delete') }}/${item.id}/report`;
        document.getElementById('deleteForm').action = deleteUrl;
    }
</script>

<!-- Delete Confirmation Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title" id="reportTitle"></h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span>This report will be permanently deleted. Do you want to proceed?</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form id="deleteForm" action="#" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


<style>
    #report-list-table th {
        color: #9f9f9f;
    }
</style>
