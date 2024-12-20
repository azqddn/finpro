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
                    Bookkeeping
                </h3>

                {{-- Main 1 --}}
                <div class="row justify-content-center"
                    style="width: 100%; height:auto; background-color:white; border-radius:10px; box-shadow: 2px 3px 6px #4b4b4b42;">
                    {{-- top --}}
                    <div class="d-flex justify-content-between align-items-center pt-4">
                        <div class="d-flex justify-content-center" style="flex: 1;">
                            {{-- Search Div --}}
                            <div class="d-flex align-items-center pt-3 ps-2 pe-2"
                                style="border: 1px solid rgb(134, 134, 134); border-radius:10px; width:400px; height:35px; box-shadow: 1px 1px 10px #00000042;">
                                {{-- Seach Input --}}
                                <form action="{{ route('display.record.owner') }}" method="GET"
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
                        {{-- Dropdown --}}
                        <div class="dropdown" style="margin-left: auto; margin-right: 0px;">
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
                                <li><a class="dropdown-item active" href="?sort=oldest">Oldest First</a></li>
                                <li><a class="dropdown-item" href="#">Revenue</a></li>
                                <li><a class="dropdown-item" href="#">Expenses</a></li>
                                <li><a class="dropdown-item" href="#">Balance</a></li>
                            </ul>
                        </div>

                    </div>


                    {{-- mid --}}
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <p class="mt-3">Status:
                            @if ($latestRecord->recordStatus != 1)
                                <span id="statusText" class="px-3"
                                    style="color:rgb(255, 255, 255); background-color: rgb(33, 107, 255); padding:5px; border-radius:12px">
                                    Opened
                                </span>
                            @else
                                <span id="statusText" class="px-3"
                                    style="color:rgb(255, 255, 255); background-color: rgb(255, 74, 74); padding:5px; border-radius:12px">
                                    Closed
                                </span>
                            @endif
                        </p>

                        {{-- 0:Removed | 1:Closed | 2:Opened  --}}
                        <div class="ms-auto">
                            <!-- Open button (only show if status is not open) -->
                            <div id="openButtonWrapper"
                                style="display: {{ $latestRecord->recordStatus == 1 ? 'inline' : 'none' }}">
                                <a href="javascript:void(0);" id="openButton" class="me-2" style="text-decoration: none;">
                                    <button
                                        style="width: 60px;height:30px; border:transparent; border-radius:10px; color:rgb(255, 255, 255); background-color:#2641ed; box-shadow: 2px 2px 3px #00000042">
                                        {{ __('Open') }}
                                    </button>
                                </a>
                            </div>

                            <!-- Close button -->
                            <div id="closeButtonWrapper"
                                style="display: {{ $latestRecord->recordStatus != 1 ? 'inline' : 'none' }}">
                                <a href="javascript:void(0);" id="closeButton" style="text-decoration: none;">
                                    <button
                                        style="width: 60px;height:30px; border:transparent; border-radius:10px; color:rgb(255, 255, 255); background-color:#e31b1b; box-shadow: 2px 2px 3px #00000042">
                                        {{ __('Close') }}
                                    </button>
                                </a>
                            </div>

                            <!-- "+" button -->
                            <div id="addRecordButtonWrapper"
                                style="display: {{ $latestRecord->recordStatus != 1 ? 'inline' : 'none' }}">
                                <a href="#" id="addRecordButton" style="text-decoration: none;">
                                    <button data-bs-toggle="modal" data-bs-target="#addRecordModal"
                                        style="width: 60px;height:30px; background-color:rgb(47, 47, 47); border:1px solid rgb(186, 186, 186); border-radius:10px; color:white; box-shadow: 2px 2px 3px #00000042;">
                                        {{ __('+') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.getElementById('openButton')?.addEventListener('click', function() {
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
                                        const statusText = document.getElementById('statusText');
                                        statusText.innerText = 'Opened';
                                        statusText.style.backgroundColor = 'rgb(30, 105, 255)';

                                        document.getElementById('openButtonWrapper').style.display = 'none';
                                        document.getElementById('closeButtonWrapper').style.display = 'inline';
                                        document.getElementById('addRecordButtonWrapper').style.display = 'inline';

                                        // Show the action column and cells
                                        toggleActionColumn(true);
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
                                        const statusText = document.getElementById('statusText');
                                        statusText.innerText = 'Closed';
                                        statusText.style.backgroundColor = 'rgb(255, 55, 55)';

                                        document.getElementById('closeButtonWrapper').style.display = 'none';
                                        document.getElementById('addRecordButtonWrapper').style.display = 'none';
                                        document.getElementById('openButtonWrapper').style.display = 'inline';

                                        // Hide the action column and cells
                                        toggleActionColumn(false);
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
                                    <th scope="col"></th>
                                    <th scope="col" style="width:175px">Date</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Revenue (RM)</th>
                                    <th scope="col">Expenses (RM)</th>
                                    <th scope="col">Balance (RM)</th>
                                    <th scope="col">Inventory Transaction</th>
                                    <th scope="col">Notes</th>
                                    {{-- Removed: 0 | Closed: 1| Opened: 2 --}}
                                    {{-- <th class="action-column" scope="col">
                                    </th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($record as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <span style="color: rgb(0, 0, 176);">
                                                {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
                                            </span>
                                            <br>
                                            <span style="color: rgb(0, 96, 0);">
                                                {{ \Carbon\Carbon::parse($item->created_at)->format('h:i A') }}
                                            </span>
                                        </td>
                                        <td>{{ $item->recordDesc }}</td>
                                        <td>
                                            @if ($item->recordRevenue)
                                                + {{ $item->recordRevenue }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->recordExpenses)
                                                - {{ $item->recordExpenses }}
                                            @endif
                                        </td>
                                        <td>{{ $item->recordBalance }}</td>
                                        <td>
                                            @if ($item->inventoryTransaction && $item->inventoryTransaction->transProduct)
                                                {{ implode(', ', explode(',', $item->inventoryTransaction->transProduct)) }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $item->recordNotes }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div id="paginate" class="d-flex justify-content-center">{{ $record->links() }}</div>
                    </div>
                </div>

                {{-- Main 2 --}}
                <div class="row justify-content-center my-4"
                    style="width: 100%; height:auto; background-color:white; border-radius:10px;box-shadow: 2px 3px 6px #4b4b4b42;">
                    aa
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Modal New Record -->
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

<!-- Script to manage dropdowns and fields for new record -->
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

        //Populate remove record modal
        function populateModal(record) {
            document.getElementById('id').value = record.id;
            document.getElementById('recordDesc').textContent = record.recordDesc;
            const removeForm = `/owner/bookkeeping/${record.id}/record/remove`;
            document.getElementById('removeForm').action = removeForm;
        }
    }
</script>

<style>
    #record-list-table th {
        color: #9f9f9f;
    }

    #summary-list-table th {
        color: #9f9f9f;
    }
</style>
