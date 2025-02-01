<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

.container {
    width: 80%;
    margin: 30px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.title {
    text-align: center;
    color: red;
    font-size: 28px;
    margin-bottom: 20px;
}

.section {
    margin-bottom: 20px;
}

h3 {
    color: blue;
    font-size: 20px;
    margin-bottom: 10px;
}

.details-table {
    width: 100%;
    border-collapse: collapse;
}

.details-table td {
    padding: 8px 12px;
    border: 1px solid #ddd;
}

.details-table td strong {
    color: #555;
}

.buttons {
    text-align: center;
    margin-top: 20px;
}

.confirm-button, .cancel-button {
    padding: 10px 20px;
    font-size: 16px;
    margin: 0 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.confirm-button {
    background-color: #4CAF50;
    color: white;
}

.cancel-button {
    background-color: #f44336;
    color: white;
}

.confirm-button:hover {
    background-color: #45a049;
}

.cancel-button:hover {
    background-color: #e53935;
}

.print-button {
    text-align: center;
    margin-top: 30px;
}

.print-button button {
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    background-color: #008CBA;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

.print-button button:hover {
    background-color: #007B8A;
}
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">#680534092 Booking Details</h2>

        <div class="section">
            <h3>User Details</h3>
            <table class="details-table">
                <tr>
                    <td><strong>Booking No.</strong></td>
                    <td>#680534092</td>
                </tr>
                <tr>
                    <td><strong>Name</strong></td>
                    <td>Bhupat Vatukiya</td>
                </tr>
                <tr>
                    <td><strong>Email Id</strong></td>
                    <td>bhupatvatukiya1@gmail.com</td>
                </tr>
                <tr>
                    <td><strong>Contact No</strong></td>
                    <td>7359509387</td>
                </tr>
                <tr>
                    <td><strong>City</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>Country</strong></td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h3>Booking Details</h3>
            <table class="details-table">
                <tr>
                    <td><strong>Vehicle Name</strong></td>
                    <td>BMW, BMW 5 Series</td>
                </tr>
                <tr>
                    <td><strong>Booking Date</strong></td>
                    <td>2025-02-01 15:55:04</td>
                </tr>
                <tr>
                    <td><strong>From Date</strong></td>
                    <td>2025-02-04</td>
                </tr>
                <tr>
                    <td><strong>To Date</strong></td>
                    <td>2025-02-13</td>
                </tr>
                <tr>
                    <td><strong>Total Days</strong></td>
                    <td>9</td>
                </tr>
                <tr>
                    <td><strong>Rent Per Day</strong></td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td><strong>Grand Total</strong></td>
                    <td>9000</td>
                </tr>
                <tr>
                    <td><strong>Booking Status</strong></td>
                    <td>Not Confirmed yet</td>
                </tr>
                <tr>
                    <td><strong>Last Return Date</strong></td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="buttons">
            <button class="confirm-button">Confirm Booking</button>
            <button class="cancel-button">Cancel Booking</button>
        </div>

        <div class="print-button">
            <button onclick="window.print()">Print</button>
        </div>
    </div>
</body>
</html>