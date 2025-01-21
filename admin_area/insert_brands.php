<?php
include('../includes/conncet.php');
if (isset($_POST['insert_brand'])) {
    // Sanitize input
    $brand_title = mysqli_real_escape_string($conn, $_POST['brand_title']);

    // Check if the category already exists
    $select_query = "SELECT * FROM `brands` WHERE brand_title = '$brand_title'";
    $select_query_result = mysqli_query($conn, $select_query);

    if ($select_query_result) {
        $number = mysqli_num_rows($select_query_result);

        if ($number > 0) {
            echo "<script>alert('This brands is already present in the database');</script>";
        } else {
            // Insert new category into the database
            $insert_query = "INSERT INTO `brands` (brand_title) VALUES ('$brand_title')";
            $result = mysqli_query($conn, $insert_query);

            if ($result) {
                echo "<script>alert('brand has been inserted successfully');</script>";
            } else {
                echo "<script>alert('Error inserting category: " . mysqli_error($conn) . "');</script>";
            }
        }
    } else {
        echo "<script>alert('Error checking category: " . mysqli_error($conn) . "');</script>";
    }
}
?>





<h2 class="text-center">Insert Brands</h2>



<form action="" method="post" class="mb-2">
   <div class="input-group w-90 mb-2">
     <span class="input-group-text bg-info" id="basic-addon1">
       <i class="fa-solid fa-receipt"></i>
     </span>
     <input type="text" class="form-control" name="brand_title" placeholder="Insert brands" 
        aria-label="brands" aria-describedby="basic-addon1">
   </div>
   <div class="input-group w-10 mb-2 m-auto">
     <input type="submit" class="bg-info   border-0 p-2 my-3 " name="insert_brand" value="Insert brands">
     
      
     </button>
   </div>
</form>


