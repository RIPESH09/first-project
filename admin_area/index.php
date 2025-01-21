<?php
// Start the session before any output

// Include necessary files
include('../includes/conncet.php'); // Corrected spelling
include('../functions/common_functions.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
          crossorigin="anonymous">
<!-- Font Awesome Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjry1PvoDwiPUiKdWk5t3Pyo1Y1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer">

<!-- Custom CSS File -->
<link rel="stylesheet" href="../style.css">

    <style>
        :root {
            --first-color: #333;
            --first-color-alt: #ADCCC5;
            --text-color: #555;
            --body-color: #fff;
            --header-height: 4rem;
            --transition: 0.3s;
        }

        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            font-family: Arial, sans-serif;
            background-color: var(--body-color);
            color: var(--text-color);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--first-color-alt);
            padding: 0 1rem;
            height: var(--header-height);
            border-bottom: 1px solid var(--first-color);
        }

        .header__left {
            font-size: 1rem;
            font-weight: bold;
            color: var(--first-color);
        }

        .header__center {
            font-size: 1.25rem;
            font-weight: bold;
            color: var(--first-color);
            text-transform: uppercase;
        }

        .header__right {
            font-size: 1rem;
            color: var(--first-color);
        }

        .nav {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.5rem;
            padding: 1rem;
            background-color: var(--first-color-alt);
        }

        .nav__list {
            display: flex;
            gap: 1rem; /* Adjust the spacing between items */
        }

        .nav__item {
            list-style: none;
        }

        .nav__link {
            font-size: 1rem;
            font-weight: bold;
            color: var(--first-color);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color var(--transition), color var(--transition);
        }

        .nav__link:hover {
            background-color: var(--first-color);
            color: #fff;
        }

        footer {
            margin-top: auto;
            background-color: var(--first-color-alt);
            text-align: center;
            color: var(--text-color);
            font-size: 0.875rem;
            padding: 1rem 0;
        }

        footer p {
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: center;
                height: auto;
                padding: 1rem;
            }

            .header__left, .header__right {
                margin: 0.5rem 0;
                font-size: 0.875rem;
            }

            .header__center {
                font-size: 1rem;
            }

            .nav {
                justify-content: center;
                gap: 0.5rem;
            }

            .nav__link {
                font-size: 0.875rem;
                padding: 0.5rem;
            }

            /* Add this style to the existing CSS section */
.center-buttons {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 2rem; /* Adjust the spacing as needed */
}

        }

 body{
        overflow-x: hidden;



 }


    </style>
</head>
<body>
    <header class="header">
    <div class="header__left">
        <?php
        if (isset($_SESSION['admin_name'])) {
            echo "Welcome, " . $_SESSION['admin_name'];
        } else {
            echo "Welcome, Guest"; // Displayed if no admin is logged in
        }
        ?>
        <a href="admin_login.php" class="btn btn-dark ml-3" style="font-size: 0.875rem;">Login</a>
    </div>
        <div class="header__center">Manage Details</div>
        <div class="header__right">Time: <span id="current-time"></span></div>
    </header>

    <nav class="nav">
        <ul class="nav__list">
            <li class="nav__item"><a href="insert_product.php" class="nav__link">Insert Products</a></li>
            <li class="nav__item"><a href="index.php?view_products" class="nav__link">View Products</a></li>
            <li class="nav__item"><a href="index.php?insert_categories" class="nav__link">Insert Categories</a></li>
            <li class="nav__item"><a href="index.php?view_categories" class="nav__link">View Categories</a></li>
            <li class="nav__item"><a href="index.php?insert_brand" class="nav__link">Insert Brands</a></li>
            <li class="nav__item"><a href="index.php?view_brands" class="nav__link">View Brands</a></li>
            <li class="nav__item"><a href="index.php?list_orders" 
            class="nav__link">All Orders</a></li>
            <li class="nav__item"><a href="index.php?list_payments" class="nav__link">All Payments</a></li>
            <li class="nav__item"><a href="index.php?list_users" class="nav__link">List Users</a></li>
            <li class="nav__item"><a href="admin_logout.php" class="nav__link">Logout</a></li>
        </ul>
    </nav>

    <div class="container ">
        <?php
            if(isset($_GET['insert_categories'])) {
                include ('insert_categories.php');
            }
            if(isset($_GET['insert_brand'])) {
                include ('insert_brands.php');
            }
            if(isset($_GET['insert_brand'])) {
                include ('insert_brands.php');
            }
            if(isset($_GET['view_products'])) {
                include ('view_products.php');
            }
            if(isset($_GET['edit_products'])) {
                include ('edit_products.php');
            }
            if(isset($_GET['delete_product'])) {
                include ('delete_product.php');
            }
            if(isset($_GET['view_categories'])) {
                include ('view_categories.php');
            }
            if(isset($_GET['view_brands'])) {
                include ('view_brands.php');
            }
            if(isset($_GET['edit_category'])) {
                include ('edit_category.php');
            }
            if(isset($_GET['edit_brands'])) {
                include ('edit_brands.php');
            }
            if(isset($_GET['delete_category'])) {
                include ('delete_category.php');
            }
            if(isset($_GET['delete_brands'])) {
                include ('delete_brands.php');
            }
            if(isset($_GET['list_orders'])) {
                include ('list_orders.php');
            }
          
            if(isset($_GET['list_payments'])) {
                include ('list_payments.php');
            }
            if(isset($_GET['list_users'])) {
                include ('list_users.php');
            }
            if(isset($_GET['admin_logout.php'])) {
                include ('admin_logout.php');
            }
        ?>
    </div>
            
    <footer class="footer">
        <p>&copy; 2024 Ripesh. All rights reserved.</p>
    </footer>

    <script>
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString();
            document.getElementById('current-time').textContent = timeString;
        }
        setInterval(updateTime, 1000);
        updateTime(); // Initial call to set time immediately
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9x/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</body>
</html>
