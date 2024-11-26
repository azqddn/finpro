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
                <h3 class="my-4" style="color: rgb(0, 0, 216)">
                    Bookkeeping
                </h3>

                {{-- Main 1 --}}
                <div class="row justify-content-center"
                    style="width: 100%; height:auto; background-color:white; border-radius:10px;box-shadow: 2px 3px 6px #4b4b4b42;">
                    {{-- top --}}
                    <div class="d-flex justify-content-between align-items-center pt-4">
                        <div class="d-flex justify-content-center" style="flex: 1;">
                            {{-- Search Div --}}
                            <div class="d-flex align-items-center pt-3 ps-2 pe-2"
                                style="border: 1px solid rgb(134, 134, 134); border-radius:10px; width:400px; height:35px; box-shadow: 1px 1px 10px #00000042;">
                                {{-- Seach Input --}}
                                <form action="" method="GET"
                                    class="d-flex justify-content-between align-items-center"
                                    style="width:100%; border-radius:10px">
                                    <input type="text" placeholder="Search" name="search" value=""
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
                        <div class="dropdown" style="margin-left: auto; margin-right: 0px;">
                            <div style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"
                                    fill="currentColor">
                                    <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
                                </svg>
                            </div>

                            <!-- Dropdown Menu -->
                            <ul class="dropdown-menu" style="">
                                <li>
                                    <a class="dropdown-item" href="">Delete History</a>
                                </li>
                                <hr>
                                <li>
                                    <a class="dropdown-item" href="">Edit History</a>
                                </li>
                            </ul>
                        </div>

                    </div>


                    {{-- mid --}}
                    <div class="d-flex justify-content-between align-items-center pt-3 mb-2">
                        <p>Status:
                            @if ($latestRecord->recordStatus == 2)
                                <span id="statusText" class="px-3"
                                    style="color:rgb(255, 255, 255); background-color: rgb(30, 105, 255); padding:5px; border-radius:12px">
                                    Opened
                                </span>
                            @else
                                <span id="statusText" class="px-3"
                                    style="color:rgb(255, 255, 255); background-color: rgb(255, 55, 55); padding:5px; border-radius:12px">
                                    Closed
                                </span>
                            @endif
                            {{-- <span id="statusText" class="px-3"
                                style="color:rgb(255, 255, 255); background-color: rgb(30, 105, 255); padding:5px; border-radius:12px">
                                {{ $latestRecord->recordStatus == 2 ? 'Opened' : 'Closed' }}
                            </span> --}}
                        </p>
                        {{-- 0:Removed | 1:Closed | 2:Opened  --}}
                        <div class="ms-auto">
                            <!-- Open button (only show if status is not open) -->
                            <div id="openButtonWrapper"
                                style="display: {{ $latestRecord->recordStatus == 2 ? 'none' : 'inline' }}">
                                <a href="javascript:void(0);" id="openButton" class="me-2" style="text-decoration: none;">
                                    <button
                                        style="width: 60px;height:30px; border:transparent; border-radius:10px; color:rgb(255, 255, 255); background-color:#3e58ff; box-shadow: 2px 2px 3px #00000042">
                                        {{ __('Open') }}
                                    </button>
                                </a>
                            </div>

                            <!-- Close button -->
                            <div id="closeButtonWrapper"
                                style="display: {{ $latestRecord->recordStatus == 2 ? 'inline' : 'none' }}">
                                <a href="javascript:void(0);" id="closeButton" style="text-decoration: none;">
                                    <button
                                        style="width: 60px;height:30px; border:transparent; border-radius:10px; color:rgb(255, 255, 255); background-color:#ff5454; box-shadow: 2px 2px 3px #00000042">
                                        {{ __('Close') }}
                                    </button>
                                </a>
                            </div>

                            <!-- "+" button -->
                            <div id="addRecordButtonWrapper"
                                style="display: {{ $latestRecord->recordStatus == 2 ? 'inline' : 'none' }}">
                                <a href="#" id="addRecordButton" style="text-decoration: none;">
                                    <button data-bs-toggle="modal" data-bs-target="#addRecordModal"
                                        style="width: 60px;height:30px; background-color:rgb(78, 78, 78); border:1px solid rgb(186, 186, 186); border-radius:10px; color:white; box-shadow: 2px 2px 3px #00000042;">
                                        {{ __('+') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.getElementById('openButton')?.addEventListener('click', function() {
                            // Send AJAX request to create the "Opening" record
                            fetch('{{ route('store.open.record.owner') }}', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({
                                        recordDesc: 'Opening',
                                    }),
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        // Update the DOM
                                        document.getElementById('statusText').innerText = 'Opened';
                                        document.getElementById('openButtonWrapper').style.display = 'none';
                                        document.getElementById('closeButtonWrapper').style.display = 'inline';
                                        document.getElementById('addRecordButtonWrapper').style.display = 'inline';
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        });

                        document.getElementById('closeButton')?.addEventListener('click', function() {
                            fetch('{{ route('store.close.record.owner') }}', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({
                                        recordDesc: 'Closing',
                                    }),
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        // Update the DOM
                                        document.getElementById('statusText').innerText = 'Closed';
                                        document.getElementById('closeButtonWrapper').style.display = 'none';
                                        document.getElementById('addRecordButtonWrapper').style.display = 'none';
                                        document.getElementById('openButtonWrapper').style.display = 'inline';
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        });
                    </script>



                    {{-- table --}}
                    <div>
                        <table id="record-list-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Revenue (RM)</th>
                                    <th scope="col">Expenses (RM)</th>
                                    <th scope="col">Balance (RM)</th>
                                    <th scope="col">Inventory Transaction</th>
                                    <th scope="col">Notes</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($record as $record)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $record->recordDesc }}</td>
                                        <td>{{ $record->recordRevenue }}</td>
                                        <td>{{ $record->recordExpenses }}</td>
                                        <td>{{ $record->recordBalance }}</td>
                                        <td></td>
                                        <td>{{ $record->recordNotes }}</td>
                                        <td class="d-flex justify-content-center">
                                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-expanded="false" style="color: #000000;">
                                                <svg width="4" height="14" viewBox="0 0 3 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <ellipse cx="1.5" cy="1.55687" rx="1.5" ry="1.55687"
                                                        fill="#171717" />
                                                    <ellipse cx="1.5" cy="7.00023" rx="1.5" ry="1.55687"
                                                        fill="#171717" />
                                                    <ellipse cx="1.5" cy="12.4436" rx="1.5" ry="1.55687"
                                                        fill="#171717" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                style="min-width: 100px; font-size: 14px; padding: 4px;">
                                                {{-- Edit --}}
                                                <li>
                                                    <a class="dropdown-item" href="">
                                                        Edit
                                                    </a>
                                                </li>
                                                <hr style="margin: 4px 0;">
                                                {{-- Remove --}}
                                                <li>
                                                    <form
                                                        action="{{ url('owner/bookkeeping/' . $record->id . '/record/remove') }}">
                                                        {{-- <a class="dropdown-item" href=""
                                                            data-bs-toggle="modal" data-bs-target="#removeModal"
                                                            onclick=""> --}}
                                                        {{-- change the value of record status and pass to the controller --}}
                                                        <input type="hidden" name="recordStatus" value="0">
                                                        <button type="submit">remove</button>
                                                        {{-- </a> --}}
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Main 2 --}}
                <div class="row justify-content-center mt-4"
                    style="width: 100%; height:auto; background-color:white; border-radius:10px;box-shadow: 2px 3px 6px #4b4b4b42;">
                    aaa
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Modal -->
<div class="modal fade" id="addRecordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{ route('store.record.owner') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Radio buttons to choose between Revenue or Expenses -->
                    <div class="mb-3">
                        <label for="recordType" class="form-label">Record Type</label><br>
                        <input type="radio" id="revenue" name="recordType" value="revenue"
                            onclick="toggleFields()" checked> <span class="me-4">Revenue</span>
                        <input type="radio" id="expenses" name="recordType" value="expenses"
                            onclick="toggleFields()"> <span>Expenses</span>
                    </div>

                    <!-- Description Field -->
                    <div class="mb-3">
                        <label for="recordDesc" class="form-label">Description</label>
                        <input type="text" class="form-control" id="recordDesc" name="recordDesc" required>
                    </div>

                    <!-- Revenue Field (will be shown when 'Revenue' is selected) -->
                    <div class="mb-3" id="revenueField">
                        <label for="recordRevenue" class="form-label">Revenue</label>
                        <input type="number" step="0.01" class="form-control" id="recordRevenue"
                            name="recordRevenue">
                    </div>

                    <!-- Expenses Field (will be shown when 'Expenses' is selected) -->
                    <div class="mb-3" id="expensesField" style="display:none;">
                        <label for="recordExpenses" class="form-label">Expenses</label>
                        <input type="number" step="0.01" class="form-control" id="recordExpenses"
                            name="recordExpenses">
                    </div>

                    <!-- Inventory Transaction Section -->
                    <div class="mb-3">
                        <label for="transId" class="form-label">Inventory Transaction</label>
                        <div id="inventoryTransactionContainer">
                            <!-- Dynamic dropdowns and integer inputs will be added here -->
                        </div>
                        <!-- Button to add more dropdowns and inputs -->
                        <button type="button" class="btn btn-outline-primary mt-2" style="width: 100%"
                            id="addDropdownBtn" onclick="addDropdown()">
                            +
                        </button>
                    </div>

                    <!-- Notes Field -->
                    <div class="mb-3">
                        <label for="recordNotes" class="form-label">Notes</label>
                        <input type="text" class="form-control" id="recordNotes" name="recordNotes">
                    </div>

                    <!-- Proof Field -->
                    <div class="mb-3">
                        <label for="recordProof" class="form-label">Proof</label>
                        <input type="file" accept=".pdf, .jpeg, .jpg, .png" class="form-control" id="recordProof"
                            name="recordProof">
                    </div>

                    <!-- Hidden Input for UserID -->
                    <input type="hidden" name="userId" value="{{ auth()->user()->id }}">

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script to manage dropdowns and fields -->
<script>
    // Function to toggle between Revenue and Expenses fields
    function toggleFields() {
        var revenueRadio = document.getElementById('revenue');
        var revenueField = document.getElementById('revenueField');
        var expensesField = document.getElementById('expensesField');

        if (revenueRadio.checked) {
            revenueField.style.display = 'block';
            expensesField.style.display = 'none';
            document.getElementById('recordRevenue').required = true;
            document.getElementById('recordExpenses').required = false;
        } else {
            revenueField.style.display = 'none';
            expensesField.style.display = 'block';
            document.getElementById('recordRevenue').required = false;
            document.getElementById('recordExpenses').required = true;
        }
    }

    // Function to add dropdown for Inventory Transactions
    function addDropdown() {
        // Create a new div element to hold the select and input field
        var newDropdownDiv = document.createElement('div');
        newDropdownDiv.classList.add('d-flex', 'mb-3');

        // Create a new select dropdown for Inventory Transaction
        var newSelect = document.createElement('select');
        newSelect.classList.add('form-select', 'me-3');
        newSelect.name = 'transId[]'; // Use array notation to store multiple transactions
        newSelect.innerHTML = `
            <option value="" disabled selected style="color: grey"></option>
            @foreach ($product as $product)
                <option value="{{ $product->productName }}">{{ $product->productName }}</option>
            @endforeach
        `;

        // Create a new input field for integer values (e.g., quantity)
        var newInput = document.createElement('input');
        newInput.type = 'number';
        newInput.classList.add('form-control');
        newInput.name = 'quantity[]'; // Use array notation to store the quantity for each transaction
        newInput.placeholder = 'Quantity';
        newInput.required = true;

        // Append the select and input field to the new div
        newDropdownDiv.appendChild(newSelect);
        newDropdownDiv.appendChild(newInput);

        // Append the new div to the container
        var container = document.getElementById('inventoryTransactionContainer');
        container.appendChild(newDropdownDiv);
    }
</script>

<style>
    #record-list-table th {
        color: #9f9f9f;
    }
</style>
