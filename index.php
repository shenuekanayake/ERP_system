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
        <h2>List of Customers</h2>
        <a class="btn btn-primary " href="/ERP_system/insert.php" role="button">New Customer</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th> First name</th>
                    <th>Middle name</th>
                    <th> Last name</th>
                    <th> Contact number</th>
                    <th> District</th>
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

                $sql= "SELECT * FROM customer";
                $result = $connection-> query($sql);

                if (!$result) {
                    die("invalid query: " . $connection->error);
                }
                

                while ($row = $result->fetch_assoc()) {
                    echo"
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[title]</td>
                    <td>$row[first_name]</td>
                    <td>$row[middle_name]</td>
                    <td>$row[last_name]</td>
                    <td>$row[contact_no]</td>
                    <td>$row[district]</td>
                    
                    <td>
                        <a class='btn btn-primary btn-sm' href='/ERP_system/edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/ERP_system/delete.php?id=$row[id]'>Delete</a>
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