

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Font Awesome for the trash icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<div class="container">
    <h3 class="text-center text-success">All Users</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Sl No</th>
                <th>username</th>
                <th>useremail</th>
                <th>user image</th>
                <th>user address</th>
                <th>usermobile</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Fetch users from the database
            $get_users = "SELECT * FROM `user_table`"; // Adjust this query to your users table
            $result = mysqli_query($conn, $get_users);
            $number = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $username = $row['username'];
                $useremail = $row['user_email'];  // Use 'user_email' instead of 'email'
                $userimage = $row['user_image'];  // Use 'user_image' instead of 'image'
                $useraddress = $row['user_address']; // Use 'user_address' instead of 'address'
                $usermobile = $row['user_mobile']; // Use 'user_mobile' instead of 'mobile'
                $number++;
            ?>
            <tr class="text-center">
                <td><?php echo $number; ?></td>
                <td><?php echo $username; ?></td>  
                <td><?php echo $useremail; ?></td>
                <td><img src="../users_area/user_images/<?php echo $userimage; ?>" alt="User Image" style="width:50px;height:50px;"></td>

                <td><?php echo $useraddress; ?></td>
                <td><?php echo $usermobile; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and required dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
