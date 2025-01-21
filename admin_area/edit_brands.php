<?php
if (isset($_GET['edit_brands'])) {
    $edit_brands = $_GET['edit_brands'];

    $get_brands = "SELECT * FROM brands WHERE brand_id = $edit_brands";
    $result = mysqli_query($conn, $get_brands);
    $row = mysqli_fetch_assoc($result);
    $brand_title = $row['brand_title']; // Corrected variable name
}

if (isset($_POST['edit_brand'])) { // Changed name from 'edit_cat' to 'edit_brand'
    $brand_title = $_POST['brand_title']; // Corrected variable name

    // Make sure to update the correct table (brands)
    $update_query = "UPDATE brands SET brand_title = '$brand_title' WHERE brand_id = $edit_brands"; // Corrected column name
    $result_brand = mysqli_query($conn, $update_query); // Corrected variable name

    if ($result_brand) {
        echo "<script> alert('Brand has been updated successfully') </script>";
        echo "<script>window.open('./index.php?view_brands', '_self');</script>"; // Corrected the redirect page
    } else {
        echo "<script> alert('Error updating brand') </script>";
    }
}
?>

<div class="container mt-3">
    <h1 class="text-center text-success">Edit Brand</h1> <!-- Changed title from 'Category' to 'Brand' -->
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 mx-auto">
            <label for="brand_title" class="form-label">Brand Title:</label> <!-- Changed label to 'Brand Title' -->
            <input type="text" name="brand_title" id="brand_title" 
            class="form-control" value="<?php echo htmlspecialchars($brand_title); ?>" 
        
            required >
        </div>
        <button type="submit" name="edit_brand" 
        class="btn btn-success">Update Brand</button> <!-- Changed button name to 'edit_brand' -->
    </form>
</div>  
