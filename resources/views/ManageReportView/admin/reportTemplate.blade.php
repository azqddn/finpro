<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $reportTitle }}</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 10px;
            line-height: 1.4;
        }

        h1,
        h2,
        h3 {
            text-align: center;
            margin: 5px 0;
        }

        h1 {
            font-size: 18px;
            text-transform: uppercase;
        }

        h2 {
            font-size: 16px;
        }

        /* Company Info Section */
        .company-info {
            text-align: center;
            margin: 0 auto 15px auto;
            /* Centering the container */
            border: 1px solid #ddd;
            padding: 8px;
            border-radius: 6px;
            max-width: 600px;
            /* Optional: Set a max-width for better centering */
        }

        .company-info img {
            width: 70px;
            height: auto;
            margin-bottom: 5px;
        }

        .company-info h4 {
            font-size: 12px;
            margin-bottom: 5px;
        }

        .company-info .company-details {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            font-size: 13px;
            margin-top: 0px;
        }

        .company-info p {
            margin: 2px 0;
        }

        .prepared-by {
            font-size: 12px;
            text-align: right;
            margin-top: 5px;
        }

        /* Separator */
        .separator {
            border-bottom: 1px solid #ccc;
            margin: 10px 0;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 6px;
            text-align: center;
            font-size: 11px;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Section Title */
        .section-title {
            margin-top: 15px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
        }

        /* Footer */
        .footer {
            text-align: center;
            font-size: 11px;
            margin-top: 20px;
            color: #666;
        }
    </style>
</head>

<body>
    <!-- Company Information Section -->
    <div class="company-info">
        <img src="{{ public_path('company/' . $company->companyLogo) }}" alt="Company Logo">
        <div class="company-details">
            <strong>{{ $company->companyName }} ({{ $company->registrationNo }})</strong><br>
            {{ $company->companyAddress }}
        </div>
    </div>
    <div class="prepared-by">
        <p>Prepared by: {{ Auth::user()->name }}</p>
        <p>Date: {{ \Carbon\Carbon::now()->format('d-m-Y h:i A') }}</p>
    </div>

    <div class="separator"></div>

    <!-- Report Title -->
    <h3>{{ $reportTitle }}</h3>

    @if ($data->first() instanceof \App\Models\Record)
        <!-- Financial Summary Table -->
        <h4 class="section-title">Financial Summary</h4>
        <table>
            <thead>
                <tr>
                    <th>Opening Balance (RM)</th>
                    <th>Total Revenue (RM)</th>
                    <th>Total Expenses (RM)</th>
                    <th>Net Balance (RM)</th>
                    <th>Closing Balance (RM)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ number_format($summary['opening_balance'], 2) }}</td>
                    <td>{{ number_format($summary['total_revenue'], 2) }}</td>
                    <td>{{ number_format($summary['total_expenses'], 2) }}</td>
                    <td>{{ number_format($summary['net_balance'], 2) }}</td>
                    <td>{{ number_format($summary['closing_balance'], 2) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Detailed Financial Records -->
        <h4 class="section-title">Detailed Financial Records</h4>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Revenue (RM)</th>
                    <th>Expenses (RM)</th>
                    <th>Balance (RM)</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y h:i A') }}</td>
                        <td>{{ $item->recordDesc }}</td>
                        <td>{{ $item->recordRevenue }}</td>
                        <td>{{ $item->recordExpenses }}</td>
                        <td>{{ $item->recordBalance }}</td>
                        <td>{{ $item->recordNotes }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <!-- Inventory Summary Table -->
        <h4 class="section-title">Inventory Summary</h4>
        <table>
            <thead>
                <tr>
                    <th>Total Products</th>
                    <th>Low Stock</th>
                    <th>Out Of Stock</th>
                    <th>Expired</th>
                    <th>Expiring Soon</th>
                    <th>Total Inventory Value (RM)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $summary['total_product'] }}</td>
                    <td>{{ $summary['low_stock_product'] }}</td>
                    <td>{{ $summary['out_of_stock_product'] }}</td>
                    <td>{{ $summary['expired_product'] }}</td>
                    <td>{{ $summary['expiring_soon_product'] }}</td>
                    <td>{{ number_format($summary['total_inventory_value'], 2) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Detailed Inventory -->
        <h4 class="section-title">Inventory Details</h4>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Cost/Unit (RM)</th>
                    <th>Total Value (RM)</th>
                    <th>Expired Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->productName }}</td>
                        <td>{{ $item->productQuantity }}</td>
                        <td>{{ number_format($item->productCost, 2) }}</td>
                        <td>{{ number_format($item->productQuantity * $item->productCost, 2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->productExpired)->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Low Stock Product -->
        <h4 class="section-title">Low Stock Product</h4>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Cost Per Unit (RM)</th>
                </tr>
            </thead>
            <tbody>
                @if ($lowStockProduct && $lowStockProduct->isNotEmpty())
                    @foreach ($lowStockProduct as $item)
                        <tr>
                            <td>{{ $item->productName }}</td>
                            <td>{{ $item->productQuantity }}</td>
                            <td>{{ $item->productCost }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No data available for Low Stock Product.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <br>

        <!-- Out of Stock Product -->
        <h4 class="section-title">Out of Stock Product</h4>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Last Purchased</th>
                    <th>Last Sold</th>
                </tr>
            </thead>
            <tbody>
                @if ($outOfStockProduct && $outOfStockProduct->isNotEmpty())
                    @foreach ($outOfStockProduct as $item)
                        <tr>
                            <td>{{ $item->productName }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No data available for Out of Stock Product.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <br>

        <!-- Expired Product -->
        <h4 class="section-title">Expired Product</h4>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Current Stock</th>
                    <th>Expired Date</th>
                    <th>Last Purchased</th>
                </tr>
            </thead>
            <tbody>
                @if ($expiredProduct && $expiredProduct->isNotEmpty())
                    @foreach ($expiredProduct as $item)
                        <tr>
                            <td>{{ $item->productName }}</td>
                            <td>{{ $item->productQuantity }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->productExpired)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No data available for Expired Product.</td>
                    </tr>
                @endif

            </tbody>
        </table>
        <br>

        <!-- Expiry Soon Product -->
        <h4 class="section-title">Expiry Soon Product</h4>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Current Stock</th>
                    <th>Expiry Date</th>
                    <th>Days Until Expired</th>
                    <th>Last Purchased</th>
                </tr>
            </thead>
            <tbody>
                @if ($expiringSoonProduct && $expiringSoonProduct->isNotEmpty())
                    @foreach ($expiringSoonProduct as $item)
                        <tr>
                            <td>{{ $item->productName }}</td>
                            <td>{{ $item->productQuantity }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->productExpired)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::now()->startOfDay()->diffInDays(\Carbon\Carbon::parse($item->productExpired)->startOfDay(), false) }} days</td>

                            <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No data available for Expiry Soon Product.</td>
                    </tr>
                @endif

            </tbody>
        </table>

    @endif

    <!-- Footer -->
    <div class="footer">
        <p>Generated by {{ config('app.name') }} | {{ \Carbon\Carbon::now()->format('d-m-Y h:i A') }}</p>
    </div>
</body>

</html>
