
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database="erp_system";
  
  $connection = new mysqli($servername, $username, $password, $database);




  $id = "";
  $Title = "";
  $first_name = "";
  $middle_name = "";
  $last_name = "";
  $contact_no = "";
  $district = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $Title = $_POST["title"];
  $first_name = $_POST["first_name"];
  $middle_name = $_POST["middle_name"];
  $last_name = $_POST["last_name"];
  $contact_no = $_POST["contact_no"];
  $district = $_POST["district"];

  
    do {
      if (empty($Title) || empty($first_name) || empty($middle_name) || empty($last_name) || empty($contact_no) || empty($district)) {
        $errorMessage = "All the fields are required";
        break;
    }
  
  
  
      
      $sql = "INSERT INTO `customer` ( title, first_name, middle_name, last_name, contact_no, district)" .
              "VALUES( '$Title', '$first_name','$middle_name','$last_name','$contact_no','$district')";
      $result = $connection->query($sql);
  
      if (!$result) {
        $errorMessage = "Invalid query: " . $connection->error;
        break;
      }
  
  
      $Title = "";
$first_name = "";
$middle_name = "";
$last_name = "";
$contact_no = "";
$district = "";
      $successMessage = "Customer added successfully";
  
      header("location:/ERP_system/index.php");
      exit;

    
  
    } while (false);
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
        <h2>New Customer</h2>

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
         


        <form method="post" action="">
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Title</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="title" value="<?php echo $Title; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">First Name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Middle Name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="middle_name" value="<?php echo $middle_name; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Last Name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">Contact number</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="contact_no" value="<?php echo $contact_no; ?>">
              </div>
          </div>
          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">District</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="district" value="<?php echo $district; ?>">
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
              <a class="btn btn-outline-primary" href="/ERP_system/index.php" role="button">Cancel</a>

             </div>
          </div>

        </form>
      </div>
    </body>
</html>
