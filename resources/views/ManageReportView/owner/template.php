<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Report</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }

        h1,
        h2,
        h3 {
            text-align: center;
            margin-bottom: 8px;
        }

        h1 {
            font-size: 20px;
            text-transform: uppercase;
            color: #333;
        }

        h2 {
            font-size: 18px;
            margin-top: 20px;
            color: #444;
        }

        /* Compact Company Information Section */
        .company-info {
            text-align: center;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            padding: 8px;
            border-radius: 6px;
        }

        .company-info img {
            width: 80px;
            height: auto;
            margin-bottom: 5px;
        }

        .company-info h1 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .company-info .details {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            font-size: 12px;
            margin-top: 5px;
        }

        .company-info p {
            margin: 2px 0;
        }

        /* Section Separator */
        hr {
            margin: 15px 0;
            border: 0;
            height: 1px;
            background: #ccc;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            font-size: 12px;
        }

        th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Footer Section */
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>

    <!-- Compact Company Information Section -->
    <div class="company-info">
        <img src="" alt="Company Logo">
        <h1>Pasar Mini Afkar (R121F3232)</h1>
        <div class="details">
            <p><strong>Address:</strong> Labu Taman Mutiara Gala</p>
            <p><strong>Phone:</strong> 01011212</p>
            <p><strong>Email:</strong> afkar@gmail.com</p>
        </div>
    </div>

    <hr>

    <!-- Report Summary Section -->
    <h2>Financial Summary</h2>
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
                <td>5,000</td>
                <td>15,000</td>
                <td>7,000</td>
                <td>8,000</td>
                <td>8,000</td>
            </tr>
        </tbody>
    </table>

    <hr>

    <!-- Detailed Records Section -->
    <h2>Detailed Financial Records</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Revenue (RM)</th>
                <th>Expenses (RM)</th>
                <th>Balance (RM)</th>
                <th>Inventory Transactions</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2024-10-01</td>
                <td>Sales Income</td>
                <td>5,000</td>
                <td>0</td>
                <td>5,000</td>
                <td>Sold 50 items</td>
                <td>Good Sales</td>
            </tr>
            <tr>
                <td>2024-10-02</td>
                <td>Utility Bill</td>
                <td>0</td>
                <td>1,000</td>
                <td>4,000</td>
                <td>-</td>
                <td>Monthly Electricity</td>
            </tr>
        </tbody>
    </table>

    <hr>

    <!-- Footer Section -->
    <div class="footer">
        <p>Generated on: <strong>2024-10-30</strong></p>
        <p>© 2024 Pasar Mini Afkar. All Rights Reserved.</p>
    </div>

</body>

</html>
<br>
        <!-- Low Stock Product -->
        <h4>Low Stock Product</h4>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Cost Per Unit (RM)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>

        <!-- Out of Stock Product -->
        <h4>Out of Stock Product</h4>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Last Purchased</th>
                    <th>Last Sold</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>

        <!-- Expired Product -->
        <h4>Expired Product</h4>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Current Stock</th>
                    <th>Expiry Date</th>
                    <th>Last Purchased</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>

        <!-- Expiry Soon Product -->
        <h4>Expiry Soon Product</h4>
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
                @foreach ($data as $item)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
