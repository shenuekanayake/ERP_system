<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database="erp_system";
    
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM customer WHERE id=$id";
    $connection ->query($sql);
}

header("location:/ERP_system/index.php");
exit;

?>