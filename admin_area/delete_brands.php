<?php

// Check if the 'delete_category' parameter is set in the GET request
if (isset($_GET['delete_brands'])) {
    $delete_brands= $_GET['delete_brands'];

    // Secure the input by escaping it (if not using prepared statements)
    $delete_brands = mysqli_real_escape_string($conn, $delete_brands);

    // Prepare the SQL DELETE query
    $delete_query = "DELETE FROM brands WHERE brand_id = '$delete_brands'";

    // Execute the query
    $delete_result = mysqli_query($conn, $delete_query);

    // Check if the query was successful
    if ($delete_result) {
        echo "<script> alert('brands has been deleted successfully') </script>";
        echo "<script>window.open('./index.php?view_brands', '_self');</script>";
    } else {
        echo "<script> alert('Error deleting category') </script>";
    }
}

?>
