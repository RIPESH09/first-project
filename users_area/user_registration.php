<?php
include("../includes/conncet.php"); // Add a semicolon here
include("../functions/common_functions.php"); // Add a semicolon here
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user-registration </title>
    <!-- css b -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
     crossorigin="anonymous">
</head>
<body>

  <div class="container-fluid my-3">
     <h2 class="text-center">New User Registration</h2>
     <div class="row d-flex align-item-center justify-content-center">
        <div class="lg-12 col-xl-6">
         <form action="" method="post" enctype="multipart/form-data">
              <div class="form-outline mb-4">
                <!-- username feild -->
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username" 
                      autocomplete="off"   required="required"  name="user_username" />
              </div> 
               <!-- user email -->
              <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="text" id="user_email" class="form-control" placeholder="Enter your email" 
                      autocomplete="off"   required="required"  name="user_email" />
              </div> 

              <!-- user iamge -->
              <div class="form-outline mb-4">
                    <label for="user_image class="form-label"> user Image</label>
                    <input type="file" id="user_image " class="form-control"  
                      autocomplete="off"   required="required"  name="user_image" />
              </div> 
               <!-- user password -->
               <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">PASSWORD</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" 
                      autocomplete="off"   required="required"  name="user_password" />
              </div> 
               <!-- user confirm password -->
               <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Confirm password</label>
                    <input type="password" id="user_email" class="form-control" placeholder="Confirm password " 
                      autocomplete="off"   required="required"  name="conf_user_password" />
              </div> 
              
              <div class="form-outline mb-4">
                <!-- address feild -->
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter your address" 
                      autocomplete="off"   required="required"  name="user_address" />
              </div>

              <div class="form-outline mb-4">
                <!-- contact feild -->
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact" 
                      autocomplete="off"   required="required"  name="user_contact" />
              </div>
              <div class="mt-4 pt-1 text-center">
    <input type="submit" value="Register" class="bg-info py-2 px-4 text-white rounded-pill" name="user_register"/>
    <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="user_login.php" class="text-danger"> Login</a></p>
</div>



         </form>






        </div>
     </div>
  </div>

</body>
</html>

<!-- php code for user registration -->

<?php
if (isset($_POST['user_register'])) {

    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();


    //select query
    $select_query = "SELECT * FROM `user_table` WHERE username = '$user_username' or  
    user_email='$user_email'";
    $result = mysqli_query($conn, $select_query);
    $rows_count= mysqli_num_rows($result);
    if ($rows_count > 0) {
      echo "<script>alert('Username and email already  exists')</script>";



    }else if ($user_password != $conf_user_password) {
      echo "<script>alert('Password and confirm password does not match')</script>";
    
    
    }
    else{

      move_uploaded_file($user_image_tmp, "./user_images/$user_image");

      // Corrected insert query
      $insert_query = "INSERT INTO user_table (username, user_email,
       user_password, user_image,user_ip, user_address, user_mobile)
      VALUES ('$user_username', '$user_email', '$hashed_password',
       '$user_image',  '$user_ip', '$user_address', '$user_contact')";
      
      $sql_execute = mysqli_query($conn, $insert_query);
    }
    // Upload user image
   

    if ($sql_execute) {
        echo "<script>alert('registration successful')</script>";
    } else {
        die("Error inserting data: " . mysqli_error($conn)); // Provide more details on the error
    }

 //SELECTING CART ITEMS
 $select_cart_items = "SELECT * FROM cart_details WHERE
 ip_address= '$user_ip'";
  $result_cart = mysqli_query($conn, $select_cart_items);
  $rows_count= mysqli_num_rows($result_cart);
  if ($rows_count > 0) {
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('checkout.php', '_self')</script>";

  }  else {

    echo "<script>window.open('../index.php', '_self')</script>";

  }



}
?>

