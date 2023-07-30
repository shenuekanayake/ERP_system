<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Invoice Report</title>
        <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
        <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
<body>
    <h2>Invoice Report</h2>
    <form action="invoice_report.php" method="POST">
    <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="date">
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="date">
        <button type="submit">Search</button>
    </form>

<div class="container my-5">
<h2>Invoice Report</h2>
<table class="table">
<thead>
                <tr>
                    <th>Invoice Number </th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Customer District</th>
                    <th>Item Count</th>
                    <th>Invoice Amount </th>
                </tr>
            </thead>
</table>
</div>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "erp_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$start_date = $_POST['date'];
$end_date = $_POST['date'];

$sql = "SELECT invoice_no, date, customer, Customer_district, item_count, amount 
        FROM invoice 
        WHERE date BETWEEN '$start_date' AND '$end_date'";
$result = $conn->query($sql);

/* if ($result->num_rows > 0) {
    $table = '<table>';
    $table .= '<tr><th>Invoice Number</th><th>date</th><th>customer</th><th>Customer_district</th><th>item_count</th><th>amount</th></tr>';
    
    while ($row = $result->fetch_assoc()) {
        $table .= '<tr>';
        $table .= '<td>' . $row['invoice_no'] . '</td>';
        $table .= '<td>' . $row['date'] . '</td>';
        $table .= '<td>' . $row['customer'] . '</td>';
        $table .= '<td>' . $row['Customer_district'] . '</td>';
        $table .= '<td>' . $row['item_count'] . '</td>';
        $table .= '<td>' . $row['amount'] . '</td>';
        $table .= '</tr>';
    }

    $table .= '</table>';
    
    echo $table;
} else {
    echo "No data found for the selected date range.";
}
*/

if (!$result) {
    die("invalid query: " . $conn->error);
}


while ($row = $result->fetch_assoc()) {
    echo"
    <tr>
    <td>$row[invoice_no]</td>
    <td>$row[date]</td>
    <td>$row[customer]</td>
    <td>$row[Customer_district]</td>
    <td>$row[item_count]</td>
    <td>$row[amount]</td>
    
   
</tr>
    ";
}


$conn->close();
?>
