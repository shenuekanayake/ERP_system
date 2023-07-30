<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP System</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">  
        <h2>List of Items</h2>
        <a class="btn btn-primary " href="/ERP_system/item_insert.php" role="button">New Items</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID </th>
                    <th> Item code</th>
                    <th> Item name</th>
                    <th> Item category</th>
                    <th>Item sub category</th>
                    <th> Quantity </th>
                    <th> Unit price  </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database="erp_system";
                
                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection-> connect_error) {
                    die("connection failed: ". $connection->connect_error);
                }

                $sql= "SELECT * FROM item";
                $result = $connection-> query($sql);

                if (!$result) {
                    die("invalid query: " . $connection->error);
                }
                

                while ($row = $result->fetch_assoc()) {
                    echo"
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[item_code]</td>
                    <td>$row[item_category]</td>
                    <td>$row[item_subcategory]</td>
                    <td>$row[item_name]</td>
                    <td>$row[quantity]</td>
                    <td>$row[unit_price]</td>
                    
                    <td>
                        <a class='btn btn-primary btn-sm' href='/ERP_system/item_edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/ERP_system/item_delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                    ";
                }

                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>
