<?php

$servername = "localhost";
  $username = "root";
  $password = "";
  $database="erp_system";
  
  $connection = new mysqli($servername, $username, $password, $database);

$id = "";
$item_code = "";
$item_category = "";
$item_subcategory = "";
$item_name = "";
$quantity = "";
$unit_price = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if (!isset($_GET["id"])) {
        header("location:/ERP_system/item_index.php");
        exit;
    }

    $id=$_GET["id"];

    $sql = "SELECT * FROM customer WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        
      header("location:/ERP_system/item_index.php");
      exit;
    }

    // methanata database eke thiyena vidihata colun name denna one
  /*  $item_code = $row["item_code"];
    $item_category = $row["item_category"];
    $item_subcategory = $row["item_subcategory"];
    $item_name = $row["item_name"];
    $quantity = $row["quantity"];
    $unit_price = $row["unit_price"];
*/

// Assuming $row is an array that contains the data
// If $row is not an array, you may need to fetch the data from the database first.

$item_code = isset($row["item_code"]) ? $row["item_code"] : '';
$item_category = isset($row["item_category"]) ? $row["item_category"] : '';
$item_subcategory = isset($row["item_subcategory"]) ? $row["item_subcategory"] : '';
$item_name = isset($row["item_name"]) ? $row["item_name"] : '';
$quantity = isset($row["quantity"]) ? $row["quantity"] : '';
$unit_price = isset($row["unit_price"]) ? $row["unit_price"] : '';

// Now you can use these variables as needed in the rest of your code
// For example, you might use them to display or update item information.


} else {
  


    $id = $_POST["id"];
    $item_code = $_POST["item_code"];
    $item_category = $_POST["item_category"];
    $item_subcategory = $_POST["item_subcategory"];
    $item_name = $_POST["item_name"];
    $quantity = $_POST["quantity"];
    $unit_price = $_POST["unit_price"];
    
    do{

        if (empty($item_code) || empty($item_category) || empty($item_subcategory) || empty($item_name) || empty($quantity) || empty($unit_price)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE item " . " SET item_code='$item_code', item_category='$item_category', item_subcategory='$item_subcategory', item_name='$item_name', quantity='$quantity', unit_price='$unit_price' " .  " WHERE id = $id";



        $result = $connection->query($sql);

  
        if (!$result) {
          $errorMessage = "Invalid query: " . $connection->error;
          break;
        }
        $successMessage = "Item Updated successfully";



    }while(false);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ERP System</title>
        <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
        <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
      <div class = "container my-5 ">
        <h2>New Item</h2>

        <?php
    if (!empty($errorMessage)) {
        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
    }
    ?>
         


        <form method="post" action="item_edit.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">item_code</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="item_code" value="<?php echo $item_code; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">item_category </label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="item_category" value="<?php echo $item_category; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">item_subcategory</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="item_subcategory" value="<?php echo $item_subcategory; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">item_name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="item_name" value="<?php echo $item_name; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">quantity</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="quantity" value="<?php echo $quantity; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">unit_price</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="unit_price" value="<?php echo $unit_price; ?>">
              </div>
          </div>

          
          <?php
    if (!empty($successMessage)) {
        echo "
        <div class='row mb-3'>
            <div class='offset-sm-3 col-sm-6'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </div>
        </div>
        ";
    }
    ?>

           


          <div class="row mb-3">
             <div class="offset-sm-3 col-sm-3 d-grid">
              <button type="submit" class="btn btn-primary">Submit</button>
             </div>
             <div class="col-sm-3 d-grid">
              <a class="btn btn-outline-primary" href="/ERP_system/item_index.php" role="button">Cancel</a>

             </div>
          </div>

        </form>
      </div>
    </body>
</html>
