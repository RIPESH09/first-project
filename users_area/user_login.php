<?php
include("../includes/conncet.php"); // Add a semicolon here
include("../functions/common_functions.php"); // Add a semicolon here

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user-Login </title>
    <!-- css b -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
     crossorigin="anonymous">


     <style>
       body {
        overflow-x:hidden
       }
     </style>
</head>
<body>

  <div class="container-fluid my-3">
     <h2 class="text-center">User login</h2>
     <div class="row d-flex align-item-center justify-content-center mt-5">
        <div class="lg-12 col-xl-6">
         <form action="" method="post" >
              <div class="form-outline mb-4">
                <!-- username feild -->
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username" 
                      autocomplete="off"   required="required"  name="user_username" />
              </div> 
             

              
               <!-- user password -->
               <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">PASSWORD</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" 
                      autocomplete="off"   required="required"  name="user_password" />
              </div> 
               

              
              <div class="mt-4 pt-1 text-center">
                    <input type="submit" value="Login" class="bg-info py-2 px-4 text-white rounded-pill" 
                         name="user_login"/>
    <p class="small fw-bold mt-2 pt-1">Don't have an account <a href="user_registration.php" 
    class="text-danger"> Register</a></p>
</div>



         </form>






        </div>
     </div>
  </div>

</body>
</html>


<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    // Select query to fetch the user data
    $select_query = "SELECT * FROM `user_table` WHERE username = '$user_username'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // CART ITEM
    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";
    $select_cart = mysqli_query($conn, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);

    if ($row_count > 0) {
        // Verify password
        if (password_verify($user_password, $row_data['user_password'])) {
            if ($row_count == 1 && $row_count_cart == 0) {
              $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successful');</script>";
                echo "<script>window.open('profile.php', '_self');</script>";
            } else {
              $_SESSION['username']=$user_username;
              
                echo "<script>alert('Login Successful');</script>";
                echo "<script>window.open('payment.php', '_self');</script>";
            }
        } else {
          
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

