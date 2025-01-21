<?php
include("../includes/conncet.php"); // Ensure the database connection is included
include("../functions/common_functions.php"); // Include necessary functions for IP address or other functionalities

if (isset($_POST['admin_register'])) {
    // Fetch input data
    $admin_name = $_POST['username'];
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];
    $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];

    // Check if password and confirm password match
    if ($admin_password != $confirm_password) {
        echo "<script>alert('Password and confirm password do not match')</script>";
    } else {
        // Check if the email or username already exists
        $select_query = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_name' OR admin_email = '$admin_email'";
        $result = mysqli_query($conn, $select_query);
        $rows_count = mysqli_num_rows($result);

        if ($rows_count > 0) {
            echo "<script>alert('Username or email already exists')</script>";
        } else {
            // Insert new admin data
            $insert_query = "INSERT INTO admin_table (admin_name, admin_email, admin_password) 
                             VALUES ('$admin_name', '$admin_email', '$hashed_password')";

            $sql_execute = mysqli_query($conn, $insert_query);

            if ($sql_execute) {
                echo "<script>alert('Registration successful')</script>";
                echo "<script>window.open('admin_login.php', '_self')</script>";
            } else {
                die("Error inserting data: " . mysqli_error($conn)); // Error handling
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 600px;
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #ADCCC5; /* Soft greenish tone */
            color: white;
            text-align: center;
            font-size: 1.5rem;
            padding: 15px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #ADCCC5; /* Soft greenish tone */
            border-color: #ADCCC5;
            padding: 12px;
            font-size: 16px;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #98B79F; /* Slightly darker green for hover */
            border-color: #98B79F;
        }
        .form-control {
            border-radius: 8px;
            box-shadow: none;
        }
        .form-control:focus {
            border-color: #ADCCC5; /* Greenish focus border */
            box-shadow: 0 0 5px rgba(173, 204, 197, 0.5); /* Light greenish glow */
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #6c757d;
        }
        .small {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Admin Registration
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" name="admin_register" class="btn btn-primary">Register</button>
                    <p class="small mt-3">Do you already have an account? <a href="admin_login.php">Login</a></p>
                </form>
            </div>
        </div>

        <div class="footer">
            <p>&copy; 2025 Admin Dashboard. All rights reserved.</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
