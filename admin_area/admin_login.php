<?php
session_start();

include("../includes/conncet.php"); // Make sure this file exists and is correct
include("../functions/common_functions.php"); // Make sure this file exists and is correct

if (isset($_POST['admin_login'])) {
    $admin_name = $_POST['admin_name']; // Use the correct name attribute from the form
    $admin_password = $_POST['admin_password'];

    // Select query to fetch the admin data (ensure the column name is correct)
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_name'"; // Ensure column name matches your DB schema
    $result = mysqli_query($conn, $select_query);
    
    if (!$result) {
        die("Query failed: " . mysqli_error($conn)); // This helps to debug if query fails
    }

    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if ($row_count > 0) {
        // Verify password
        if (password_verify($admin_password, $row_data['admin_password'])) {
            $_SESSION['admin_name'] = $admin_name;
            echo "<script>alert('Login Successful');</script>";
            echo "<script>window.open('', '_self');</script>";  // Redirect to admin_area.php
        } else {
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Admin Login
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="admin_username">Username</label>
                        <input type="text" class="form-control" id="admin_username" name="admin_name" placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <label for="admin_password">Password</label>
                        <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="admin_login">Login</button>
                    <p class="small">Don't have an account? 
                        <a href="admin_registration.php">Register</a></p>
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
