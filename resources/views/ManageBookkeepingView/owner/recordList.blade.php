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
                        <div class="dropdown" style="margin-left: auto; margin-right: 0px;">
                            <div style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg width="18" height="18" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.29303 5.707C8.10556 5.51947 8.00024 5.26517 8.00024 5C8.00024 4.73484 8.10556 4.48053 8.29303 4.293L11.293 1.293C11.3853 1.19749 11.4956 1.12131 11.6176 1.0689C11.7396 1.01649 11.8709 0.988904 12.0036 0.987751C12.1364 0.986597 12.2681 1.0119 12.391 1.06218C12.5139 1.11246 12.6255 1.18671 12.7194 1.28061C12.8133 1.3745 12.8876 1.48615 12.9379 1.60905C12.9881 1.73194 13.0134 1.86362 13.0123 1.9964C13.0111 2.12918 12.9835 2.2604 12.9311 2.38241C12.8787 2.50441 12.8025 2.61475 12.707 2.707L9.70703 5.707C9.5195 5.89447 9.26519 5.99979 9.00003 5.99979C8.73487 5.99979 8.48056 5.89447 8.29303 5.707Z"
                                        fill="#444444" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.707 5.707C15.5195 5.89447 15.2652 5.99979 15 5.99979C14.7349 5.99979 14.4806 5.89447 14.293 5.707L11.293 2.707C11.1109 2.5184 11.0101 2.2658 11.0124 2.0036C11.0146 1.7414 11.1198 1.49059 11.3052 1.30518C11.4906 1.11977 11.7414 1.01461 12.0036 1.01233C12.2658 1.01005 12.5184 1.11084 12.707 1.293L15.707 4.293C15.8945 4.48053 15.9998 4.73484 15.9998 5C15.9998 5.26517 15.8945 5.51947 15.707 5.707Z"
                                        fill="#444444" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 3C12.2653 3 12.5196 3.10536 12.7071 3.29289C12.8947 3.48043 13 3.73478 13 4V12C13 12.2652 12.8947 12.5196 12.7071 12.7071C12.5196 12.8946 12.2653 13 12 13C11.7348 13 11.4805 12.8946 11.2929 12.7071C11.1054 12.5196 11 12.2652 11 12V4C11 3.73478 11.1054 3.48043 11.2929 3.29289C11.4805 3.10536 11.7348 3 12 3ZM7.70704 10.293C7.89451 10.4805 7.99983 10.7348 7.99983 11C7.99983 11.2652 7.89451 11.5195 7.70704 11.707L4.70704 14.707C4.51844 14.8892 4.26584 14.99 4.00364 14.9877C3.74144 14.9854 3.49063 14.8802 3.30522 14.6948C3.11981 14.5094 3.01465 14.2586 3.01237 13.9964C3.01009 13.7342 3.11088 13.4816 3.29304 13.293L6.29304 10.293C6.48057 10.1055 6.73488 10.0002 7.00004 10.0002C7.26521 10.0002 7.51951 10.1055 7.70704 10.293Z"
                                        fill="#444444" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.293031 10.293C0.480558 10.1055 0.734866 10.0002 1.00003 10.0002C1.26519 10.0002 1.5195 10.1055 1.70703 10.293L4.70703 13.293C4.80254 13.3852 4.87872 13.4956 4.93113 13.6176C4.98354 13.7396 5.01113 13.8708 5.01228 14.0036C5.01343 14.1364 4.98813 14.2681 4.93785 14.391C4.88757 14.5138 4.81332 14.6255 4.71943 14.7194C4.62553 14.8133 4.51388 14.8875 4.39098 14.9378C4.26809 14.9881 4.13641 15.0134 4.00363 15.0123C3.87085 15.0111 3.73963 14.9835 3.61763 14.9311C3.49562 14.8787 3.38528 14.8025 3.29303 14.707L0.293031 11.707C0.105559 11.5195 0.000244141 11.2652 0.000244141 11C0.000244141 10.7348 0.105559 10.4805 0.293031 10.293Z"
                                        fill="#444444" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4 13C3.73478 13 3.48043 12.8946 3.29289 12.7071C3.10536 12.5196 3 12.2652 3 12V4C3 3.73478 3.10536 3.48043 3.29289 3.29289C3.48043 3.10536 3.73478 3 4 3C4.26522 3 4.51957 3.10536 4.70711 3.29289C4.89464 3.48043 5 3.73478 5 4V12C5 12.2652 4.89464 12.5196 4.70711 12.7071C4.51957 12.8946 4.26522 13 4 13Z"
                                        fill="#444444" />
                                </svg>
                            </div>

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
                    <div class="d-flex justify-content-between align-items-center pt-3 mb-2">
                        <p>Status:
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
