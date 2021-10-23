<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Dashboard</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
              <h2 class="text-center">PHP CRUD with <a href="#">MOZILAMO</a></h2>
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Users</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New User</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "database.php";

                    // select all users
                    $data = "SELECT * FROM crud";
                    if($users = mysqli_query($conn, $data)){
                        if(mysqli_num_rows($users) > 0){
                            echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                while($user = mysqli_fetch_array($users)) {
                                    echo "<tr>
                                            <td>" . $user['id'] . "</td>
                                            <td>" . $user['first_name'] . "</td>
                                            <td>" . $user['last_name'] . "</td>
                                            <td>" . $user['email'] . "</td>
                                            <td>" . $user['phone_number'] . "</td>
                                            <td>" . $user['address'] . "</td>
                                            <td>
                                             <button class='btn btn-primary'> <a href='edit.php?id=". $user['id'] . " ' class='text-light'>Edit</a></button>
                                             <button class='btn btn-danger'> <a href='delete.php?id=". $user['id'] . " ' class='text-light'>Delete</a></button>
                                            </td>
                                          </tr>";
                                }
                                echo "</tbody>
                                </table>";
                            mysqli_free_result($users);
                        } else{
                            echo "<p class='lead'><em>No records found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>