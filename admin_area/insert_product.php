<?php

include('../includes/conncet.php'); // Corrected the spelling of "connect"

if (isset($_POST['insert_product'])) {

    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_categories = $_POST['product_categories'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // Accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // Accessing image temp names
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // Checking empty condition
    if ($product_title == '' || $description == '' || $product_keywords == '' || 
        $product_categories == '' || $product_brands == '' || $product_price == '' || 
        $product_image1 == '' || $product_image2 == '' || $product_image3 == '') {

        echo "<script>alert('Please fill all the available fields')</script>";
        exit();

    } else {
        // Moving uploaded files
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // Insert query
        $insert_products = "INSERT INTO `products` 
            (product_title, product_description, product_keywords, category_id, brand_id, 
             product_image1, product_image2, product_image3, product_price, date, status) 
            VALUES 
            ('$product_title', '$description', '$product_keywords', '$product_categories', 
             '$product_brands', '$product_image1', '$product_image2', '$product_image3', 
             '$product_price', NOW(), '$product_status')";

        $insert_result = mysqli_query($conn, $insert_products);
        if ($insert_result) {
            echo "<script>alert('Product added successfully')</script>";
        } else {
            echo "<script>alert('Error: Unable to add product')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product - Admin Dashboard</title>
    
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjry1PvoDwiPUiKdWk5t3Pyo1Y1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f0f4f8; /* Subtle background color */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Modern font */
            margin: 0;
            padding: 0;
        }

        /* Container to align the content at the top middle */
        .container {
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Align to the top */
            align-items: center; /* Center horizontally */
            padding-top: 50px; /* Space from the top */
            position: relative;
        }

        /* Heading Style */
        h1 {
            font-size: 3.5rem; /* Bigger font size */
            font-weight: 700; /* Bold font */
            color: #E9F6EB; /* Light color for the heading */
            text-align: center;
            text-transform: uppercase; /* Make the heading uppercase */
            letter-spacing: 3px; /* Letter spacing for elegance */
            background: linear-gradient(45deg, #4db8ff, #ff66b3); /* Gradient background */
            -webkit-background-clip: text; /* Gradient text */
            color: transparent; /* Make text transparent for gradient effect */
            text-shadow: 4px 4px 12px rgba(0, 0, 0, 0.3); /* Strong shadow for pop */
            margin-bottom: 30px;
            padding: 10px;
        }

        /* Form container styling */
        .form-container {
            background: #ffffff; /* White background */
            padding: 40px;
            border-radius: 20px; /* Fully rounded corners */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); /* Strong shadow for depth */
            width: 60%;
            animation: popIn 1s ease-out; /* Animation for pop effect */
        }

        /* Animation for the form pop-in effect */
        @keyframes popIn {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Input Fields */
        .form-outline {
            margin-bottom: 25px;
            position: relative;
        }

        /* Input Field Style */
        .form-control {
            border: none;
            background-color: #f1f5f8; /* Light background for input */
            border-radius: 10px; /* Rounded corners */
            padding: 15px;
            font-size: 1rem;
            color: #333;
            width: 100%;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1); /* Soft inner shadow */
            transition: all 0.3s ease;
        }

        /* Focus Effect on Input */
        .form-control:focus {
            outline: none;
            background-color: #ffffff; /* White background on focus */
            box-shadow: 0 0 10px rgba(77, 184, 255, 0.8); /* Blue glow on focus */
            border: 2px solid #4db8ff; /* Blue border on focus */
        }

        /* Label Style */
        .form-label {
            font-size: 1.1rem;
            font-weight: bold;
            color: #555;
            margin-bottom: 8px;
        }

        /* Button Style */
        .btn-custom {
            background: linear-gradient(45deg, #4db8ff, #ff66b3); /* Gradient background for button */
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 1.1rem;
            border-radius: 50px; /* Pill button */
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        /* Hover Effect for Button */
        .btn-custom:hover {
            background-color: #3388cc; /* Darker blue for hover */
            transform: scale(1.05); /* Slightly scale the button */
        }

        /* Select Dropdown Styling */
        .select-custom {
            background-color: #f1f5f8;
            border: none;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        /* Select dropdown focus effect */
        .select-custom:focus {
            border: 2px solid #4db8ff;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(77, 184, 255, 0.8);
        }

        /* File Input Styling */
        input[type="file"] {
            background-color: #f1f5f8;
            border: none;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        /* File input focus effect */
        input[type="file"]:focus {
            border: 2px solid #4db8ff;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(77, 184, 255, 0.8);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                padding-top: 30px;
            }

            .form-container {
                width: 90%; /* Form takes more space on smaller screens */
            }

            .form-outline {
                width: 100%; /* Form fields take full width */
            }
        }
    </style>

</head>
<body class="bg-light">
    <div class="container">
        <h1>Insert Products</h1>

        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">

            <!-- Title -->
            <div class="form-outline mb-4 w-50">
                <label for="Product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="Product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <!-- Description -->
            <div class="form-outline mb-4 w-50">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>

            <!-- Keywords -->
            <div class="form-outline mb-4 w-50">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

            <!-- Categories -->
            <div class="form-outline mb-4 w-50">
                <select name="product_categories" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                        $select_query = "SELECT * FROM `categories`";
                        $select_result = mysqli_query($conn, $select_query);

                        while ($row = mysqli_fetch_assoc($select_result)) {
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>

            <!-- Brands -->
            <div class="form-outline mb-4 w-50">
                <select name="product_brands" class="form-select">
                    <option value="">Select a Brand</option>
                    <?php
                        $select_query = "SELECT * FROM `brands`";
                        $select_result = mysqli_query($conn, $select_query);

                        while ($row = mysqli_fetch_assoc($select_result)) {
                            $brand_title = $row['brand_title'];
                            $brand_id = $row['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>
                </select>
            </div>

            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>

            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>

            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <!-- Submit -->
            <div class="form-outline mb-4 w-50">
                <input type="submit" name="insert_product" class="btn btn-info" value="Insert Product">
            </div>

        </form>
    </div>
</body>
</html>
