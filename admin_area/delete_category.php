<?php

// Check if the 'delete_category' parameter is set in the GET request
if (isset($_GET['delete_category'])) {
    $delete_category = $_GET['delete_category'];

    // Secure the input by escaping it (if not using prepared statements)
    $delete_category = mysqli_real_escape_string($conn, $delete_category);

    // Prepare the SQL DELETE query
    $delete_query = "DELETE FROM categories WHERE category_id = '$delete_category'";

    // Execute the query
    $delete_result = mysqli_query($conn, $delete_query);

    // Check if the query was successful
    if ($delete_result) {
        echo "<script> alert('Category has been deleted successfully') </script>";
        echo "<script>window.open('./index.php?view_categories', '_self');</script>";
    } else {
        echo "<script> alert('Error deleting category') </script>";
    }
}

?>
