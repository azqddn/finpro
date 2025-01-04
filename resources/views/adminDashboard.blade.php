@extends('layouts.adminNav')

@section('content')
    <div style="width: 85%; height:auto; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto">
            {{-- Content --}}
            <div class="mt-4 me-3 row justify-content-center" style="width:95%; height:auto; margin:7px">
                <h3 class="mb-4" style="color: rgb(27, 27, 27)">
                    Overview
                </h3>

                {{-- Chart --}}
                <div class="row px-0" style="width: 100%; height:auto">

                    {{-- lvl 1 chart --}}
                    <div class="d-flex px-0 mb-4 justify-content-between" style="width:100%; height:auto">

                        {{-- 1st box --}}
                        <div class="d-flex justify-content-center align-items-center"
                            style="background-color:rgb(82, 99, 255); color:white; width:23%; height:100px; border-radius:30px; box-shadow: 2px 3px 6px #4b4b4b42;">
                            <div class="m-3 px-3 text-start" style="width:100%; height:auto;">
                                <p class="h2">{{ $totalRevenue }}</p>
                                <p class="h6">Total Revenue (RM)</p>
                            </div>
                        </div>

                        {{-- 2nd box --}}
                        <div class="d-flex justify-content-center align-items-center"
                            style="background-color:rgb(255, 112, 143); color:white; width:23%; height:100px; border-radius:30px; box-shadow: 2px 3px 6px #4b4b4b42;">
                            <div class="m-3 px-3 text-start" style="width:100%; height:auto;">
                                <p class="h2">{{ $totalExpenses }}</p>
                                <p class="h6">Total Expenses (RM)</p>
                            </div>
                        </div>

                        {{-- 3rd box --}}
                        <div class="d-flex justify-content-center align-items-center"
                            style="background-color:rgb(131, 131, 131); color:white; width:23%; height:100px; border-radius:30px; box-shadow: 2px 3px 6px #4b4b4b42;">
                            <div class="m-3 px-3 text-start" style="width:100%; height:auto;">
                                <p class="h2">{{ $totalAvailableProducts }}</p>
                                <p class="h6">Total Product Available</p>
                            </div>
                        </div>

                        {{-- 4th box --}}
                        <div class="d-flex justify-content-center align-items-center"
                            style="background-color:rgb(26, 26, 26); color:white; width:23%; height:100px; border-radius:30px; box-shadow: 2px 3px 6px #4b4b4b42;">
                            <div class="m-3 px-3 text-start" style="width:100%; height:auto;">
                                <p class="h2">{{ $totalUsers }}</p>
                                <p class="h6">Total Users Available</p>
                            </div>
                        </div>

                    </div>

                    {{-- lvl 2 chart --}}
                    <div class="d-flex px-0 mb-4" style="width:100%; height:603px;">
                        {{-- Line Chart: Monthly Balance --}}
                        <div class="me-4 p-3 d-flex justify-content-center text-center"
                            style="float:left; background-color: white; border-radius: 5px; box-shadow: 2px 3px 6px #4b4b4b42; width:50%; height:600px">
                            <div class="m-2" style="width:100%; height:100%">
                                <p class="h5">Monthly Balance</p>
                                <div class="d-flex justify-content-center align-items-center"
                                    style="width: 100%; height:85%">
                                    <canvas id="balanceChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="p-0" style="float:left; width:50%; height:100%;">
                            {{-- User List --}}
                            <div class="p-3 mb-3 ms-0 row justify-content-center text-center"
                                style="background-color: white; border-radius: 5px; box-shadow: 2px 3px 6px #4b4b4b42; width:100%; height:42%">
                                <p class="h5">Active Users</p>
                                <div class="mt-2 row justify-content-center" style="width: 100%; height:90%;">
                                    <div class="d-flex flex-column">
                                        @foreach ($user as $item)
                                            <div class="p-2 ps-4 text-start mb-2"
                                                style="border:1px solid grey; border-radius:20px"><svg
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                                    height="18" fill="currentColor" style="{{ $item->type == 'admin' ? 'color:rgb(83, 83, 83);' : ($item->type == 'owner' ? 'color:rgb(43, 43, 255);' : 'color:rgb(255, 162, 178);') }}">
                                                    <path
                                                        d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z">
                                                    </path>
                                                </svg>
                                                <strong class="ms-3">{{ $item->name }}</strong></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Bar Chart: Revenue vs Expenses --}}
                            <div class="p-3 ms-0 row justify-content-center text-center"
                                style="background-color: white; border-radius: 5px; box-shadow: 2px 3px 6px #4b4b4b42; width:100%; height:55%">
                                <div class="" style="width:100%; height:100%">
                                    <p class="h5">Revenue vs Expenses</p>
                                    <div class="d-flex justify-content-center align-items-center"
                                        style="width: 100%; height:90%;">
                                        <canvas id="revenueExpensesChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- lvl 3 chart --}}
                    <div class="d-flex px-0 mb-4" style="width:100%; height:auto">

                        {{-- Product Sales Trend --}}
                        <div class="me-3 p-3 d-flex justify-content-center text-center"
                            style="background-color: white; border-radius: 5px; box-shadow: 2px 3px 6px #4b4b4b42; width:50%; height:300px">
                            <div class="m-2" style="width:100%; height:100%">
                                <p class="h5">Product Sales Trend</p>
                                <div class="d-flex justify-content-center align-items-center"
                                    style="width: 100%; height:85%">
                                    <canvas id="productSalesChart"></canvas>
                                </div>
                            </div>
                        </div>

                        {{-- Product Quantity Sold Trend --}}
                        <div class="p-3 d-flex justify-content-center text-center"
                            style="background-color: white; border-radius: 5px; box-shadow: 2px 3px 6px #4b4b4b42; width:50%; height:300px">
                            <div class="" style="width:100%; height:100%">
                                <p class="h5">Product Quantity Sold Trend</p>
                                <div class="d-flex justify-content-center align-items-center"
                                    style="width: 100%; height:90%;">
                                    <canvas id="productQuantityChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Bar Chart: Revenue vs Expenses
            var ctx = document.getElementById('revenueExpensesChart').getContext('2d');
            var revenueExpensesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($months),
                    datasets: [{
                            label: 'Revenue',
                            data: @json($revenues),
                            backgroundColor: 'rgb(47, 47, 255)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Expenses',
                            data: @json($expenses),
                            backgroundColor: 'rgba(255, 99, 132, 0.6)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Line Chart: Monthly Balance
            var ctxLine = document.getElementById('balanceChart').getContext('2d');
            var balanceChart = new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: @json($months),
                    datasets: [{
                        label: 'Monthly Balance',
                        data: @json($balances),
                        backgroundColor: 'rgb(255, 203, 214)',
                        borderColor: 'rgb(255, 112, 143)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgb(255, 112, 143)',
                        pointRadius: 4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Horizontal Bar Chart: Product Sales Trend
            var ctxSales = document.getElementById('productSalesChart').getContext('2d');
            new Chart(ctxSales, {
                type: 'bar',
                data: {
                    labels: @json($productNames),
                    datasets: [{
                        label: 'Sales (RM)',
                        data: @json($productSales),
                        backgroundColor: 'rgb(82, 99, 255)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Horizontal Bar Chart: Product Quantity Trend
            var ctxQuantity = document.getElementById('productQuantityChart').getContext('2d');
            new Chart(ctxQuantity, {
                type: 'bar',
                data: {
                    labels: @json($productNames),
                    datasets: [{
                        label: 'Quantity Sold',
                        data: @json($productQuantities),
                        backgroundColor: 'rgb(131, 131, 131)',
                        borderColor: 'grey',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
