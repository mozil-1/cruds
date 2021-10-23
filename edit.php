<?php
require_once "database.php";

$firstName = $lastName = $email = $phoneNumber = $address = "";
$first_name_error = $last_name_error = $email_error = $phone_number_error = $address_error = "";


    $id = $_POST["id"];

    if (isset($_POST['submit'])){
        $firstName=  $row['first_name'];
        $lastName= $_POST['last_name'];
        $email= $_POST['email'];
        $phoneNumber= $_POST['phone_number'];
        $address= $_POST['address'];
    
          $sql = "UPDATE `crud` SET `first_name`= '$firstName', `last_name`= '$lastName', `email`= '$email', `phone_number`= '$phoneNumber', `address`= '$address' WHERE id='$id'";
          $result = mysqli_query($conn, $sql);
          if ($result) {
              echo "updated successfully";
          } else {
              echo "Something went wrong. Please try again later.";
          }
          mysqli_close($conn);
          exit();
    }

   
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update User</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="form-group ">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $firstName; ?>">
                            
                        </div>

                        <div class="form-group ">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $lastName; ?>">
                            
                        </div>

                        <div class="form-group ">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                            
                        </div>

                        <div class="form-group ">
                            <label>Phone Number</label>
                            <input type="number" name="phone_number" class="form-control" value="<?php echo $phoneNumber; ?>">
                            
                        </div>

                        <div class="form-group ">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>