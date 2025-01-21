<?php
include('../includes/conncet.php');

if (isset($_POST['insert_cat'])) {
    // Sanitize input
    $category_title = mysqli_real_escape_string($conn, $_POST['cat_title']);

    // Handle image upload
    if (isset($_FILES['cat_image']) && $_FILES['cat_image']['error'] === UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES['cat_image']['tmp_name'];
        $image_name = time() . '_' . $_FILES['cat_image']['name']; // Unique name for the image
        $upload_dir = "../uploads/categories/"; // Directory for uploads

        // Ensure the upload directory exists
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $target_file = $upload_dir . $image_name;

        // Move the uploaded file
        if (move_uploaded_file($image_tmp_name, $target_file)) {
            $db_image_path = 'uploads/categories/' . $image_name; // Path to store in the database

            // Check if the category already exists
            $select_query = "SELECT * FROM `categories` WHERE category_title = '$category_title'";
            $select_query_result = mysqli_query($conn, $select_query);

            if ($select_query_result) {
                $number = mysqli_num_rows($select_query_result);

                if ($number > 0) {
                    echo "<script>alert('This category is already present in the database');</script>";
                } else {
                    // Insert new category into the database with image
                    $insert_query = "INSERT INTO `categories` (category_title, category_image) VALUES ('$category_title', '$db_image_path')";
                    $result = mysqli_query($conn, $insert_query);

                    if ($result) {
                        echo "<script>alert('Category has been inserted successfully');</script>";
                    } else {
                        echo "<script>alert('Error inserting category: " . mysqli_error($conn) . "');</script>";
                    }
                }
            } else {
                echo "<script>alert('Error checking category: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Error uploading image.');</script>";
        }
    } else {
        echo "<script>alert('Please upload a valid image.');</script>";
    }
}
?>

<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2" enctype="multipart/form-data">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert category title" 
            aria-label="categories" aria-describedby="basic-addon1" required>
    </div>
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon2">
            <i class="fa-solid fa-image"></i>
        </span>
        <input type="file" class="form-control" name="cat_image" placeholder="Upload category image" 
            aria-label="category image" aria-describedby="basic-addon2" accept="image/*" required>
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Insert Category">
    </div>  
</form>
