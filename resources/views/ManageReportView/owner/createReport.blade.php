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
                    Create New Report
                </h3>

                {{-- Main 1 --}}
                <div class="row justify-content-center"
                    style="width: 100%; height:auto; background-color:white; border-radius:20px; box-shadow: 2px 3px 6px #4b4b4b42;">
                    sasas
                </div>
            </div>
        </div>
    </div>
@endsection