@extends('layouts.ownerNav')

@section('content')
    <div class="" style="width:85%; height:auto; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto; position:relative">
            {{-- Content --}}
            <div class="mt-4 row justify-content-center" style="width:70%; height:auto">
                {{-- Alert --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }};
                    </div>
                @elseif (session('destroy'))
                    <div class="alert alert-danger">
                        {{ session('destroy') }};
                    </div>
                @endif

                <h3 class="my-4">Product Edit History</h3>
                {{-- Main --}}
                <div class="row justify-content-center px-5 mb-5"
                    style="width: 100%; height:auto; background-color:rgb(255, 255, 255); box-shadow: 2px 3px 6px #0213ff42; border-radius:10px; padding-top:15px; padding-bottom:15px">
                    {{-- List --}}
                    @foreach ($editedProducts->sortByDesc(function ($groupedByDate) {
            return \Carbon\Carbon::parse($groupedByDate->first()->created_at)->format('Y-m-d');
        }) as $date => $groupedByDate)
                        {{-- Display the date once --}}
                        <h5 class="my-3 text-end" style="color: rgb(59, 59, 59);"><strong>{{ $date }}</strong></h5>

                        {{-- Group edits by time (H:i) within the same date --}}
                        @foreach ($groupedByDate->groupBy(function ($item) {
                return \Carbon\Carbon::parse($item->created_at)->format('H:i');
            })->sortByDesc(function ($groupedEdits) {
                return \Carbon\Carbon::parse($groupedEdits->first()->created_at)->format('H:i');
            }) as $time => $groupedEdits)
                            <div class="mb-4"
                                style="border: 1px solid rgb(161, 161, 161); padding: 10px; border-radius: 10px;">

                                {{-- Flexbox container for time and delete button --}}
                                <div class="d-flex justify-content-between align-items-center">
                                    {{-- Time --}}
                                    <h6 style="color: rgb(83, 83, 83)"><strong>Time: {{ $time }}</strong></h6>

                                    {{-- Delete Button --}}
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        onclick="populateModal({{ $groupedEdits->first()->id }})">
                                        <button type="button" style="border:none; background:none; cursor:pointer;">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                                height="16" fill="currentColor">
                                                <path
                                                    d="M10.5859 12L2.79297 4.20706L4.20718 2.79285L12.0001 10.5857L19.793 2.79285L21.2072 4.20706L13.4143 12L21.2072 19.7928L19.793 21.2071L12.0001 13.4142L4.20718 21.2071L2.79297 19.7928L10.5859 12Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </a>

                                </div>
                                <h6 style="color: blue"><strong>{{ $groupedEdits->first()->product->productName }}</strong>
                                </h6>
                                <h6>Edit By: {{ $groupedEdits->first()->user->name }}</h6>
                                <h6>Reason: {{ $groupedEdits->first()->reason }}</h6>
                                <h6>Edit Proof:
                                    @if ($groupedEdits->first()->editProof)
                                        <a href="{{ asset('editedProduct/' . $groupedEdits->first()->editProof) }}"
                                            target="_blank">View Proof</a>
                                    @else
                                        N/A
                                    @endif
                                </h6>
                                <hr>
                                @foreach ($groupedEdits as $editedProduct)
                                    <div style="margin-bottom: 10px;">
                                        @if ($editedProduct->fieldChanged == 'productName')
                                            <p><strong>Field Changed:</strong> Product Name</p>
                                        @elseif ($editedProduct->fieldChanged == 'productCost')
                                            <p><strong>Field Changed:</strong> Cost</p>
                                        @elseif ($editedProduct->fieldChanged == 'productSell')
                                            <p><strong>Field Changed:</strong> Price</p>
                                        @elseif ($editedProduct->fieldChanged == 'productQuantity')
                                            <p><strong>Field Changed:</strong> Quantity</p>
                                        @elseif ($editedProduct->fieldChanged == 'stockAlert')
                                            <p><strong>Field Changed:</strong> Low Stock Alert</p>
                                        @elseif ($editedProduct->fieldChanged == 'productExpired')
                                            <p><strong>Field Changed:</strong> Expired Date</p>
                                        @elseif ($editedProduct->fieldChanged == 'expiredAlert')
                                            <p><strong>Field Changed:</strong> Expired Alert</p>
                                        @elseif ($editedProduct->fieldChanged == 'categoryId')
                                            <p><strong>Field Changed:</strong> Category</p>
                                        @endif
                                        <p><strong>Old Value:</strong> {{ $editedProduct->oldValue }}</p>
                                        <p><strong>New Value:</strong> {{ $editedProduct->newValue }}</p>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        @endforeach
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

{{-- JS --}}
<script>
    function populateModal(editHistoryId) {
        // Set the action URL dynamically with the correct ID
        var deleteForm = document.getElementById('deleteForm');
        deleteForm.action = '/owner/delete/' + editHistoryId + '/edit/history'; // Adjusted the prefix to '/owner'
    }
</script>


<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this edit history?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE') <!-- Use the DELETE method -->
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
