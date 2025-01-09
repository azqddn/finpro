@extends('layouts.staffNav')

@section('content')
    <div style="width: 85%; height:auto; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto">
            {{-- Content --}}
            <div class="mt-4 me-3 row justify-content-center" style="width:65%; height:auto; margin-left:20px">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }};
                    </div>
                @elseif (session('destroy'))
                    <div class="alert alert-danger">
                        {{ session('destroy') }};
                    </div>
                @endif
                <h3 class="mb-4">
                    Create Report
                </h3>

                {{-- Main --}}
                <div class="row justify-content-center px-4 py-4"
                    style="width: 100%; height:auto; background-color:white; border-radius:10px; box-shadow: 2px 3px 6px #4b4b4b42;">
                    <h5 class="mb-5" style="color: rgb(78, 78, 78)">Choose Your Report</h5>
                    <!-- Report Selection -->
                    <form id="reportForm" method="POST" action="{{ route('staff.report.generate') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="reportType">Report Type:</label>
                            <select class="form-select" id="reportType" name="report_type">
                                <option value="financial">Financial Report</option>
                                <option value="inventory">Inventory Report</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="durationType">Duration Type:</label>
                            <select class="form-select" id="durationType" name="duration_type">
                                <option value="daily">Daily</option>
                                <option value="monthly">Monthly</option>
                            </select>
                        </div>

                        <!-- Dynamic Fields -->
                        <div class="form-group mb-3" id="dailyField" style="display: none;">
                            <label for="date">Select Date:</label>
                            <input type="date" class="form-control" name="date" id="date">
                        </div>
                        <div class="form-group mb-3" id="monthlyField" style="display: none;">
                            <label for="month">Select Month:</label>
                            <select class="form-select" name="month" id="month">
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                @endfor
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 me-0">Generate Report</button>
                    </form>

                    <div id="reportActions" class="mt-4" style="display: none;">
                        <button id="downloadReport" class="btn btn-success">Download Report</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('durationType').addEventListener('change', function() {
            document.getElementById('dailyField').style.display = this.value === 'daily' ? 'block' : 'none';
            document.getElementById('monthlyField').style.display = this.value === 'monthly' ? 'block' : 'none';
        });
    </script>
@endsection
