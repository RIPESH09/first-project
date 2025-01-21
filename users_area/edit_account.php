<?php
// Ensure session is started
include('../includes/conncet.php');  // Replace with your database connection file

if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_session_name'";
    $result_query = mysqli_query($conn, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);

    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
    $user_image = $row_fetch['user_image'];

    if (isset($_POST['user_update'])) {
        $update_id = $user_id;
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image_new = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];

        // Handle image upload only if a new image is provided
        if (!empty($user_image_new)) {
            $user_image = $user_image_new;
            move_uploaded_file($user_image_temp, "./user_images/$user_image");
        }

        // Update query
        $update_data = "UPDATE `user_table` 
                        SET `username`='$username', `user_email`='$user_email', 
                            `user_address`='$user_address', `user_mobile`='$user_mobile', 
                            `user_image`='$user_image' 
                        WHERE user_id=$update_id";

        $result_query_update = mysqli_query($conn, $update_data);

        if ($result_query_update) {
            echo "<script>alert('Account updated successfully');</script>";
            echo "<script>window.open('logout.php', '_self');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h2 class="text-success mb-4">Edit Account</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Username Field -->
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username; ?>" name="username">
        </div>
        <!-- Email Field -->
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email; ?>" name="user_email">
        </div>
        <!-- Image Field -->
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image">
            <img src="./user_images/<?php echo $user_image; ?>" alt="User Image" class="edit_image" style="width: 50px; height: 50px; margin-left: 10px;">
        </div>
        <!-- Address Field -->
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address; ?>" name="user_address">
        </div>
        <!-- Mobile Field -->
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile; ?>" name="user_mobile">
        </div>
        <!-- Update Button -->
        <input type="submit" value="Update" class="py-2 px-3 border-0 m-auto d-block w-20" 
               name="user_update" style="background-color: #E9F6EB;">
    </form>
</body>
</html>
