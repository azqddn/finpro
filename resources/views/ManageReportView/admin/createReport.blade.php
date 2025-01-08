@extends('layouts.adminNav')

@section('content')
    <div style="width: 85%; height:auto; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto">
            {{-- Content --}}
            <div class="mt-4 me-3 row justify-content-center" style="width:65%; height:auto; margin-left:20px">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('destroy'))
                    <div class="alert alert-danger">
                        {{ session('destroy') }}
                    </div>
                @endif
                <h3 class="mb-4" >
                    Report
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
                    
                        <div class="form-group mb-3" id="durationTypeWrapper">
                            <label for="durationType">Duration Type:</label>
                            <select class="form-select" id="durationType" name="duration_type">
                                <option value="daily">Daily</option> <!-- Visible for Financial only -->
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                            </select>
                        </div>
                    
                        <!-- Daily Field (for financial only) -->
                        <div class="form-group mb-3" id="dailyField" style="display: none;">
                            <label for="date">Select Date:</label>
                            <input type="date" class="form-control" name="date" id="date">
                        </div>
                    
                        <!-- Weekly Field -->
                        <div class="form-group mb-3" id="weeklyField" style="display: none;">
                            <label for="week">Select Start of the Week:</label>
                            <input type="date" class="form-control" name="date" id="week">
                        </div>
                    
                        <!-- Monthly Field -->
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
        document.getElementById('reportType').addEventListener('change', function() {
            const reportType = this.value;
            const durationTypeWrapper = document.getElementById('durationTypeWrapper');
            const durationType = document.getElementById('durationType');
    
            if (reportType === 'inventory') {
                durationType.innerHTML = `
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                `;
            } else {
                durationType.innerHTML = `
                    <option value="daily">Daily</option>
                    <option value="monthly">Monthly</option>
                `;
            }
    
            document.getElementById('dailyField').style.display = 'none';
            document.getElementById('weeklyField').style.display = 'none';
            document.getElementById('monthlyField').style.display = 'none';
        });
    
        document.getElementById('durationType').addEventListener('change', function() {
            const value = this.value;
    
            document.getElementById('dailyField').style.display = value === 'daily' ? 'block' : 'none';
            document.getElementById('weeklyField').style.display = value === 'weekly' ? 'block' : 'none';
            document.getElementById('monthlyField').style.display = value === 'monthly' ? 'block' : 'none';
        });
    </script>
@endsection
